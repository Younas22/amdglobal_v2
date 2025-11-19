<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\NewsletterSubscriber;
use App\Models\FlightBooking;
use App\Models\VisaRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_visarequest' => VisaRequest::count(),
            'blogs_count' => BlogPost::count(),
            'NewsletterSubscriber' => NewsletterSubscriber::count(),
            'total_customers' => User::customers()->count(),
            'active_customers' => User::customers()->active()->count(),
            'vip_customers' => User::customers()->vip()->count(),
            'avg_customer_value' => User::customers()->avg('total_spent') ?? 0,
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'total_revenue' => Booking::where('status', 'confirmed')->sum('total_amount'),
            'monthly_revenue' => Booking::where('status', 'confirmed')
                                     ->whereMonth('created_at', now()->month)
                                     ->sum('total_amount'),
            'new_customers_this_month' => User::customers()
                                            ->whereMonth('created_at', now()->month)
                                            ->count(),
            'new_blogs_this_month' => BlogPost::whereMonth('created_at', now()->month)
                                            ->count(),
            'new_subscriber_this_month' => NewsletterSubscriber::whereMonth('created_at', now()->month)
                                            ->count(),

            'total_bookings' => FlightBooking::count(),
            'confirmed_bookings' => FlightBooking::where('booking_status_flag', 'confirmed')->count(),
            'pending_bookings' => FlightBooking::where('booking_status_flag', 'pending')->count(),
            'total_revenue' => FlightBooking::where('booking_status_flag', 'confirmed')->sum('booking_fare_base'),
        ];

        // Recent bookings
        $recent_bookings = FlightBooking::latest()
                                 ->take(5)
                                 ->get();
        
        // Recent customers
        $recent_customers = User::customers()
                               ->latest()
                               ->take(5)
                               ->get();
        return view('admin.dashboard.index', compact('stats', 'recent_bookings', 'recent_customers'));
    }
}