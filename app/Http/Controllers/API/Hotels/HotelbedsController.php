<?php

namespace App\Http\Controllers\API\Hotels;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HotelbedsController extends BaseController
{
    private const RESULTS_PER_PAGE = 100;
    private const API_ENDPOINTS = [
        'dev' => 'https://api.test.hotelbeds.com/hotel-api/1.0/hotels',
        'pro' => 'https://api.hotelbeds.com/hotel-api/1.0/hotels',
    ];
    private const HOTEL_IMAGE_BASE_URL = 'http://photos.hotelbeds.com/giata/';

    /**
     * Search for Hotels using Hotelbeds API
     */

    public function hotel_search(Request $request): JsonResponse
    {
        try {
            $validated = $this->validate_input($request);

            $destination = $this->get_destination($validated['city']);
            if (!$destination) {
                return $this->error_response('Destination not found.');
            }

            $hotel_codes = $this->get_hotel_codes($destination->code);
            if (empty($hotel_codes)) {
                return $this->error_response('No hotels available for selected destination.');
            }

            $api_response = $this->call_hotelbeds_api($validated, $hotel_codes);
            if (!$this->isvalid_api_response($api_response)) {
                return $this->error_response('No hotels found for selected search criteria.');
            }

            $formatted_hotels = $this->format_hotels($api_response['hotels']['hotels']);

            return $this->success_response([
                'total' => $api_response['hotels']['total'],
                'data' => $formatted_hotels,
            ], 'Hotels fetched successfully');

        } catch (Exception $e) {
            return $this->error_response('Server Error', ['exception' => $e->getMessage()]);
        }
    }

    /**
     * Validate incoming request
     */
    private function validate_input(Request $request): array
    {
        $rules = [
            'city' => 'required|string|max:100',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'rooms' => 'required|integer|min:1',
            'currency' => 'required|string|size:3',
            'env' => 'required|in:dev,pro',
            'api_credential_1' => 'required|string',
            'api_credential_2' => 'required|string',
            'country_code' => 'nullable|string|size:2',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            throw new Exception('Validation Error: ' . json_encode($validator->errors()));
        }

        return $validator->validated();
    }

    /**
     * Retrieve destination by name
     */
    private function get_destination(string $city)
    {
        return DB::connection('hotelbeds')->table('destinations')->where('name', 'LIKE', '%' . $city . '%')->first();
    }

    /**
     * Get hotel codes for a destination
     */
    private function get_hotel_codes(string $destinationCode): array
    {
        return DB::connection('hotelbeds')->table('hotels')->where('destinationCode', $destinationCode)->offset(1)->limit(self::RESULTS_PER_PAGE)->pluck('hotel_code')->toArray();
    }

    /**
     * Call HotelBeds API
     */
    private function call_hotelbeds_api(array $validated, array $hotelCodes): array
    {
        $timestamp = time();
        $signature = $this->generate_signature(
            $validated['api_credential_1'],
            $validated['api_credential_2'],
            $timestamp
        );

        $payload = $this->build_api_payload($validated, $hotelCodes);
        $url = self::API_ENDPOINTS[$validated['env']];

        $response = Http::withHeaders([
            'Api-key' => $validated['api_credential_1'],
            'X-Signature' => $signature,
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if (!$response->successful()) {
            throw new Exception("API request failed: {$response->status()}");
        }

        return $response->json();
    }

    /**
     * Generate SHA256 signature
     */
    private function generate_signature(string $apiKey, string $secret, int $timestamp): string
    {
        return hash('sha256', $apiKey . $secret . $timestamp);
    }

    /**
     * Build API request payload
     */
    private function build_api_payload(array $validated, array $hotelCodes): array
    {
        $paxes = $this->build_paxes($validated);

        return [
            'sourceMarket' => $validated['country_code'] ?? 'PK',
            'lastUpdateTime' => now()->format('Y-m-d'),
            'stay' => [
                'checkIn' => date('Y-m-d', strtotime($validated['checkin'])),
                'checkOut' => date('Y-m-d', strtotime($validated['checkout'])),
                'allowOnlyShift' => true,
            ],
            'occupancies' => [
                [
                    'rooms' => intval($validated['rooms']),
                    'adults' => intval($validated['adults']),
                    'children' => intval($validated['children'] ?? 0),
                    'paxes' => $paxes,
                ]
            ],
            'hotels' => [
                'hotel' => $hotelCodes,
            ],
        ];
    }

    /**
     * Build paxes array for API
     */
    private function build_paxes(array $validated): array
    {
        $paxes = [];

        // Add adults
        for ($i = 0; $i < $validated['adults']; $i++) {
            $paxes[] = ['type' => 'AD'];
        }

        // Add children with ages
        if (!empty($validated['children']) && isset($validated['child_ages'])) {
            $childAges = is_string($validated['child_ages'])
                ? json_decode($validated['child_ages'], true)
                : $validated['child_ages'];

            if (is_array($childAges)) {
                foreach ($childAges as $ageData) {
                    $age = $ageData['ages'] ?? $ageData['age'] ?? null;
                    if ($age !== null) {
                        $paxes[] = ['type' => 'CH', 'age' => intval($age)];
                    }
                }
            }
        }

        return $paxes;
    }

    /**
     * Validate API response
     */
    private function isvalid_api_response(array $response): bool
    {
        return !empty($response['hotels']) &&
            isset($response['hotels']['total']) &&
            $response['hotels']['total'] > 0 &&
            isset($response['hotels']['hotels']);
    }

    /**
     * Format hotel data for response
     */
    private function format_hotels(array $hotelsData): array
    {
        return array_map(function (array $hotel) {
            $hotelDetails = $this->get_hotel_details($hotel['code']);
            return [
                'hotel_id' => $hotel['code'],
                'name' => $this->sanitize_name($hotel['name'] ?? ''),
                'location' => $hotel['destinationName'] ?? '',
                'description' => $hotelDetails->description ?? '',
                'address' => $this->format_address($hotelDetails),
                'categoryCode' => $hotel['categoryCode'] ?? null,
                'categoryName' => $hotel['categoryName'] ?? '',
                'stars' => intval(preg_replace('/\D/', '', $hotel['categoryName'] ?? '0')),
                'latitude' => floatval($hotel['latitude'] ?? 0),
                'longitude' => floatval($hotel['longitude'] ?? 0),
                'minRate' => floatval($hotel['rooms'][0]['rates'][0]['net'] ?? 0),
                'currency' => $hotel['currency'] ?? '',
                'room_name' => $hotel['rooms'][0]['name'] ?? '',
                'images' => $this->format_image($hotelDetails->images ?? ''),
                'supplier_name' => "hotelbeds",
                'redirect' => "",
            ];
        }, $hotelsData);
    }

    /**
     * Get hotel details from database
     */
    private function get_hotel_details($hotelCode)
    {
        return DB::connection('hotelbeds')->table('hotels')
            ->where('hotel_code', $hotelCode)
            ->first() ?? (object)[];
    }

    /**
     * Sanitize hotel name
     */
    private function sanitize_name(string $name): string
    {
        return str_replace('&', '-', trim($name));
    }

    /**
     * Format address
     */
    private function format_address($hotelDetails): string
    {
        $addressParts = [
            $hotelDetails->address ?? '',
            $hotelDetails->city ?? '',
            $hotelDetails->postalCode ?? '',
        ];

        return implode(', ', array_filter($addressParts));
    }

    /**
     * Format image URL
     */
    private function format_image(?string $images): string
    {
        if (!$images) {
            return '';
        }

        $imageArray = explode(',', $images);
        $firstImage = trim($imageArray[0]);

        return !empty($firstImage) ? self::HOTEL_IMAGE_BASE_URL . $firstImage : '';
    }

    /**
     * Success response
     */
    private function success_response(array $data = [], string $message = 'Success'): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            ...$data,
        ]);
    }

    /**
     * Error response
     */
    private function error_response(string $message, array $details = []): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            ...$details,
        ], 400);
    }

    /**
     * Details for Hotels using Hotelbeds API
     */

    public function hotel_details(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'hotel_id'        => 'required|string|max:100',
                'checkin'         => 'required|date|after_or_equal:today',
                'checkout'        => 'required|date|after:checkin',
                'adults'          => 'required|integer|min:1',
                'childs'          => 'nullable|integer|min:0',
                'child_age'       => 'nullable|string',
                'rooms'           => 'required|integer|min:1',
                'currency'        => 'required|string|size:3',
                'env'             => 'required|in:dev,pro',
                'api_credential_1'=> 'required|string',
                'api_credential_2'=> 'required|string',
                'supplier_name'=> 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->error_response("Validation Error", $validator->errors());
            }

            $paxes = [];

            // Adults
            for ($i = 0; $i < $request->adults; $i++) {
                $paxes[] = ["type" => "AD", "age" => null];
            }

            // Children (if available)
            if ($request->filled('childs') && $request->filled('child_age')) {
                $child_ages = json_decode($request->child_age, true);

                for ($i = 0; $i < $request->childs; $i++) {
                    $paxes[] = [
                        "type" => "CH",
                        "age"  => $child_ages[$i]['ages'] ?? null
                    ];
                }
            }

            $url = $request->env === "dev"
                ? "https://api.test.hotelbeds.com/hotel-api/1.0/hotels"
                : "https://api.hotelbeds.com/hotel-api/1.0/hotels";

            $payload = [
                "stay" => [
                    "checkIn" => date("Y-m-d", strtotime($request->checkin)),
                    "checkOut" => date("Y-m-d", strtotime($request->checkout))
                ],
                "occupancies" => [
                    [
                        "rooms" => (int)$request->rooms,
                        "adults" => (int)$request->adults,
                        "children" => (int)$request->childs,
                        "paxes" => $paxes
                    ]
                ],
                "currency" => $request->currency,
                "hotels" => [
                    "hotel" => [$request->hotel_id]
                ],
            ];

            $response = Http::withHeaders([
                "Api-key" => $request->api_credential_1,
                "X-Signature" => hash("sha256", $request->api_credential_1 . $request->api_credential_2 . time()),
                "Accept" => "application/json",
            ])->post($url, $payload);

            $data = $response->json();

            if (isset($data["error"])) {
                return response()->json([
                    "success" => false,
                    "message" => $data["error"]["message"] ?? "Something went wrong",
                    "code"    => $data["error"]["code"] ?? null,
                ]);
            }

            if (!empty($data['hotels']['hotels'])) {
                $response = collect($data['hotels']['hotels'])->map(function ($rec) {

                    $hotel = DB::connection('hotelbeds')->table('hotels')->where('hotel_code', $rec['code'])->first();

                    $dest = DB::connection('hotelbeds')->table('destinations')->where('code', $rec['destinationCode'])->first();

                    $facilities = DB::connection('hotelbeds')->table('facilities')->whereIn('facilityGroupCode', [60, 70, 71, 73, 74, 80, 85, 90, 91])->select('facilityGroupCode', 'description', 'code as facilityCode')->get()->toArray();

                    $hdata = json_decode($hotel->all_data ?? "{}", true);
                    $hotel_imgs = collect($hdata['images'] ?? [])->pluck('path')->map(fn($img) => 'http://photos.hotelbeds.com/giata/'.$img)->toArray();

                    $facilities_values = collect($hdata['facilities'] ?? [])
                        ->filter(fn($f) => in_array($f['facilityGroupCode'], [60, 70, 71, 73, 74, 80, 85, 90, 91]))->map(fn($f) => collect($facilities)->firstWhere('facilityCode', $f['facilityCode']))
                        ->filter()
                        ->pluck('description')
                        ->toArray();

                    $room_facilities = collect($hdata['facilities'] ?? [])
                        ->filter(fn($f) => $f['facilityGroupCode'] == 60)
                        ->map(fn($f) => collect($facilities)
                            ->firstWhere('facilityCode', $f['facilityCode'])
                        )
                        ->filter()
                        ->pluck('description')
                        ->toArray();

                    $rooms = collect($rec['rooms'])->map(function ($room) use ($room_facilities, $hotel_imgs) {
                        return [
                            "id"          => $room['code'],
                            "name"        => $room['name'],
                            "price"       => $room['rates'][0]['net'],
                            "per_day"  => $room['rates'][0]['net'],
                            "currency"    => "USD",
                            "refundable"  => $room['rates'][0]['cancellationPolicies'][0]['amount'] ?? 0,
                            "refund_date" => $room['rates'][0]['cancellationPolicies'][0]['from'] ?? null,
                            "images"      => $hotel_imgs,
                            "amenities"   => $room_facilities,
                            "options"     => collect($room['rates'])->map(function ($opt) {
                                return [
                                    "id"       => $opt['rateKey'],
                                    "price"    => $opt['net'],
                                    "per_day"  => $opt['net'],
                                    "adults"   => $opt['adults'],
                                    "child"    => $opt['children'],
                                    "children_ages" => collect($opt['paxes'] ?? [])->pluck('age')->toArray(),
                                ];
                            }),
                        ];
                    });

                    return [
                        "h_id"      => $rec['code'],
                        "h_name"    => $rec['name'],
                        "city"      => $dest->name ?? '',
                        "country"   => $hdata['countryCode'] ?? '',
                        "stars"     => intval(preg_replace('/\D/', '', $rec['categoryName'] ?? '0')),
                        "rating"    => $hdata['ranking'] ?? '',
                        "lat"       => $rec['latitude'],
                        "lng"       => $rec['longitude'],
                        "address"   => "{$hotel->address}, {$hotel->city}, {$hotel->postalCode}",
                        "desc"      => $hdata['description']['content'] ?? '',
                        "imgs"      => $hotel_imgs,
                        "amenities" => $facilities_values,
                        "checkin"   => request()->checkin,
                        "checkout"  => request()->checkout,
                        "rooms"     => $rooms,
                    ];
                });
            }

            return response()->json([
                "success"      => true,
                "response" => $response,
            ], 200);

        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => "Server Error", "exception" => $e->getMessage()], 500);
        }
    }

}
