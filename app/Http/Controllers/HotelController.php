<?php
namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TravelPartner;
class HotelController extends Controller
{


    /**
     * Show the home page (hotel search section).
     */
    public function index()
    {
        return view('hotel.hotel');
    }

    /**
     * Search and display list of hotels based on criteria.
     *
     * @param string $destination
     * @param string $checkin
     * @param string $checkout
     * @param int $adult
     * @param int $child
     * @param int $room
     * @param string $nationality
     * @return \Illuminate\View\View
     */
    public function search($destination, $checkin, $checkout, $adult, $child, $room, $nationality)
    {
        try {

            $suppliers = TravelPartner::where('status', 'active')->where('supplier_type', 'hotel')->get();

            if ($suppliers->isEmpty()) {
                return view('hotel.list', [
                    'error' => 'No active hotel suppliers found.',
                ]);
            }

            $endpoint = url('/') . '/api/hotelbeds/hotel_search';

            $payload = [
                'city' => $destination,
                'checkin' => date('Y-m-d', strtotime($checkin)),
                'checkout' => date('Y-m-d', strtotime($checkout)),
                'adults' => $adult,
                'childs' => $child,
                'child_age' => '',
                'rooms' => $room,
                'currency' => 'USD',
                'env' => 'dev',
            ];

            // Prepare session data
            $session_data = $this->prepare_session_data($payload);
            session(['hotel_search' => $session_data]);

            // Make parallel requests to all suppliers
            $all_hotels = [];

            foreach ($suppliers as $supplier) {
                $endpoint = url('/') . '/api/'.$supplier->company_name.'/hotel_search';
                $supplier_payload = array_merge($payload, [
                    'endpoint' => $endpoint,
                    'api_credential_1' => $supplier->api_credential_1,
                    'api_credential_2' => $supplier->api_credential_2,
                    'api_credential_3' => $supplier->api_credential_3,
                    'api_credential_4' => $supplier->api_credential_4,
                    'api_credential_5' => $supplier->api_credential_5,
                    'api_credential_6' => $supplier->api_credential_6,
                ]);
                $response = Http::post($endpoint, $supplier_payload);
                $data = $response->json();

                if (!empty($data) && isset($data['data']) && is_array($data['data'])) {
                    foreach ($data['data'] as $hotel) {
                        $all_hotels[] = [
                            'hotel_id' => $hotel['hotel_id'],
                            'images' => $hotel['images'],
                            'name' => $hotel['name'],
                            'location' => $hotel['location'],
                            'address' => $hotel['address'],
                            'stars' => $hotel['stars'],
                            'latitude' => $hotel['latitude'],
                            'longitude' => $hotel['longitude'],
                            'currency' => 'USD',
                            'supplier_name' => $hotel['supplier_name'],
                            'redirect' => $hotel['redirect'],
                            'room_name' => $hotel['room_name'],
                            'minRate' => $hotel['minRate'],
                            'categoryCode' => $hotel['categoryCode'],
                            'categoryName' => $hotel['categoryName'],
                        ];
                    }
                }
            }

            if (!empty($all_hotels)) {
                $sorted_hotels = collect($all_hotels)
                    ->sortBy('actual_price')
                    ->values()
                    ->toArray();

                // echo"<pre>"; print_r($sorted_hotels); exit;

                return view('hotel.list', [
                    'status' => true,
                    'message' => 'Hotels found',
                    'hotels' => $sorted_hotels,
                    'hotel_search' => session('hotel_search'),
                ]);
            } else {
                return view('hotel.list', [
                    'status' => false,
                    'message' => 'No hotels found',
                    'hotels' => [],
                ]);
            }
        } catch (\Exception $exception) {
            return view('hotel.list', [
                'error' => 'An error occurred while searching for hotels. Please try again.',
                'debug_error' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Display details of a single hotel.
     *
     * @param int $hotel_id
     * @param string $hotel_name
     * @param string $checkin
     * @param string $checkout
     * @param int $adults
     * @param int $childs
     * @param int $rooms
     * @param string $supplier_name
     * @return \Illuminate\View\View
     */
    public function details($hotel_id, $hotel_name, $checkin, $checkout, $adults, $childs, $rooms, $supplier_name)
    {
        try {
            $endpoint = url('/') . '/api/'.$supplier_name.'/hotel_details';

            $payload = [
                'endpoint' => $endpoint,
                'hotel_id' => $hotel_id,
                'checkin' => date('Y-m-d', strtotime($checkin)),
                'checkout' => date('Y-m-d', strtotime($checkout)),
                'adults' => $adults,
                'childs' => $childs,
                'child_age' => '',
                'rooms' => $rooms,
                'currency' => 'USD',
                "api_credential_1" => "c6070d0561e87fa98758c397205ec912",
                "api_credential_2" => "fcbb3cfe02",
                'env' => "dev",
                'supplier_name' => $supplier_name,
            ];

            $response = Http::post($endpoint, $payload);
            $data = $response->json();

            if (isset($data['status']) && $data['status'] === false) {
                $message = $data['message'] ?? 'No hotel found for selected criteria.';

                return view('hotel.details', [
                    'error' => $message,
                ]);
            }

            return view('hotel.details', [
                'details' => $data['response'] ?? [],
                'hotel_search' => session('hotel_search'),
            ]);
        } catch (\Exception $exception) {
            return view('hotel.details', [
                'error' => 'An error occurred while retrieving hotel details. Please try again.',
            ]);
        }
    }

    /**
     * Display hotel booking page with encrypted data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function hotel_booking(Request $request)
    {
        try {
            $encrypted_room = $request->input('room');
            $encrypted_option = $request->input('option');
            $encrypted_booking = $request->input('booking_data');

            $room = json_decode(decrypt($encrypted_room));
            $booking_option = json_decode(decrypt($encrypted_option), true);
            $booking_data = json_decode(decrypt($encrypted_booking), true);

            return view('hotel.booking', [
                'room' => $room,
                'booking_option' => $booking_option,
                'booking_data' => $booking_data,
                'hotel_search' => session('hotel_search'),
            ]);
        } catch (\Exception $exception) {
            return abort(400, 'Invalid booking data provided.');
        }
    }

    /**
     * Save hotel booking to database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function booking(Request $request)
    {

            $room = json_decode(decrypt($request->input('room')), true);
            $option = json_decode(decrypt($request->input('option')), true);
            $booking_data = json_decode(decrypt($request->input('booking_data')), true);
            $user = $request->input('user');

            $bookingdata = [
                'room' => $room,
                'option' => $option,
                'booking_data' => $booking_data,
            ];

            $guestData = $this->buildGuestData($request);

            $booking_payload = [
                'booking_code_ref' => date('YmdHis'),
                'booking_status_flag' => 'pending',
                'booking_fare_base' => $option['price'] ?? 0,
                'booking_adult_count' => $booking_data['adults'] ?? 0,
                'booking_child_count' => $booking_data['child'] ?? 0,
                'booking_currency_origin' => 'USD',
                'booking_payment_state' => 'unpaid',
                'booking_data' => json_encode($bookingdata),
                'booking_supplier_name' => 'hotelbeds',
                'booking_user_data' => json_encode($user),
                'booking_guest' => json_encode($guestData),
                'booking_nationality_code' => $user['country'] ?? null,
                'booking_payment_gateway' => 'stripe',
            ];

            $booking = HotelBooking::create($booking_payload);

            if ($booking) {
                //$invoice_url = route('hotel.invoice', ['bookingRef' => $booking->booking_code_ref]);
                $invoice_url = route('hotel.hotelbooking', ['bookingRef' => $booking->booking_code_ref]);
                return redirect($invoice_url);
            }

            return back()->withError('Failed to create booking. Please try again.');
    }

    /**
     * Display invoice for a specific booking.
     *
     * @param string $bookingRef
     * @return \Illuminate\View\View
     */
    public function invoice($bookingRef)
    {
        $booking = HotelBooking::where('booking_code_ref', $bookingRef)->first();
        if (!$booking) {
            abort(404, 'Booking not found.');
        }

        return view('hotel.invoice', compact('booking'));
    }

    /**
     * Build guest data array from request inputs.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    private function buildGuestData(Request $request): array
    {
        $guestData = [];

        // Add adult guests
        for ($i = 1; $i <= 2; $i++) {
            $guestData[] = (object) [
                'traveller_type' => $request->input("traveller_type_$i"),
                'title' => $request->input("adult_gender_$i"),
                'first_name' => $request->input("adult_first_name_$i"),
                'last_name' => $request->input("adult_last_name_$i"),
            ];
        }

        // Add child guests
        for ($i = 1; $i <= 2; $i++) {
            $guestData[] = (object) [
                'traveller_type' => $request->input("traveller_child_$i"),
                'first_name' => $request->input("child_first_name_$i"),
                'last_name' => $request->input("child_last_name_$i"),
            ];
        }

        return $guestData;
    }


        public function hotelbooking($bookingRef)
    {
        return view('hotel.hotelbookingmsg', compact('bookingRef'));
    }


    /**
     * Prepare session data
     *
     * @param array $params
     * @return array
     */
    private function prepare_session_data(array $params): array
    {
        $totalPassengers = $params['adults'] + $params['childs'];

        return [
            'city' => $params['city'],
            'checkin' => $params['checkin'],
            'checkout' => $params['checkout'],
            'adults' => $params['adults'],
            'childs' => $params['childs'],
            'child_age' => $params['child_age'],
            'rooms' => $params['rooms'],
            'currency' => $params['currency'],
            'search_timestamp' => now()->toDateTimeString(),
            'passenger_count' => $totalPassengers,
        ];
    }

}
