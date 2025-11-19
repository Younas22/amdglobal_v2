<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\FlightBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }
    
    /**
     * Display all bookings with filters and search
     */
    public function allBookings(Request $request)
    {
        $query = FlightBooking::query();

        // Apply search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Apply payment state filter
        if ($request->filled('payment_state')) {
            $query->byPaymentState($request->payment_state);
        }

        // Apply date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        $bookings = $query->latest()->paginate(15);

        // Calculate statistics
        $stats = $this->getBookingStats();

        return view('admin.bookings.all', compact('bookings', 'stats'));
    }

    /**
     * Display cancelled and refunded bookings
     */
    public function cancelledRefunds(Request $request)
    {
        $query = FlightBooking::query()
            ->whereIn('booking_status_flag', ['cancelled'])
            ->orWhere('booking_payment_state', 'refunded');

        // Apply search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Apply date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        $bookings = $query->latest()->paginate(15);

                // Calculate statistics
        $stats = $this->getBookingStats();
        return view('admin.bookings.cancelled-refunds', compact('bookings','stats'));
    }

    /**
     * Display pending confirmations
     */
    public function pendingConfirmations(Request $request)
    {
        $query = FlightBooking::query()->byStatus('pending');

        // Apply search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Apply date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        $bookings = $query->latest()->paginate(15);
                        // Calculate statistics
        $stats = $this->getBookingStats();
        return view('admin.bookings.pending-confirmations', compact('bookings','stats'));
    }


    /**
     * Get booking statistics
     */
    private function getBookingStats()
    {
        return [
            'total' => FlightBooking::count(),
            'confirmed' => FlightBooking::byStatus('confirmed')->count(),
            'pending' => FlightBooking::byStatus('pending')->count(),
            'cancelled' => FlightBooking::byStatus('cancelled')->count(),
            'paid' => FlightBooking::byPaymentState('paid')->count(),
            'unpaid' => FlightBooking::byPaymentState('unpaid')->count(),
            'refunded' => FlightBooking::byPaymentState('refunded')->count(),
        ];
    }
    
}