@extends('admin.layouts.app')

@section('title', 'Booking')

@section('content')
        <!-- Content Area -->
        <div class="content-area">

            <!-- Filters -->
            <div class="filter-card">
                <form method="GET" action="{{ route('admin.bookings.all') }}">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label">Search Bookings</label>
                            <div class="search-container">
                                <i class="bi bi-search"></i>
                                <input type="text" name="search" class="form-control search-input" 
                                       placeholder="Search by booking ID, customer name, email..." 
                                       value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="">All Status</option>
                                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Date From</label>
                            <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Date To</label>
                            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                                <a href="{{ route('admin.bookings.all') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Bookings Table -->
            <div class="bookings-table">
                <div class="table-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Bookings ({{ number_format($bookings->total()) }})</h5>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Route</th>
                                <th>Flight Details</th>
                                <th>Travel Date</th>
                                <th>Passengers</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Partner</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>
                                    <a href="{{ url('flight/invoice', $booking->booking_code_ref) }}" style="text-decoration: none;">
                                        <div class="fw-semibold">#{{ $booking->booking_code_ref }}</div>
                                        <small class="text-muted">{{ $booking->created_at->format('M j, Y') }}</small>
                                    </a>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        @php
                                            $initials = collect(explode(' ', $booking->customer_name))->map(function($name) {
                                                return strtoupper(substr($name, 0, 1));
                                            })->take(2)->implode('');
                                            $colors = ['28a745', 'dc3545', '6f42c1', 'fd7e14', '20c997'];
                                            $color = $colors[crc32($booking->customer_name) % count($colors)];
                                        @endphp
                                        <img src="https://via.placeholder.com/32x32/{{ $color }}/ffffff?text={{ $initials }}" 
                                             alt="" class="rounded-circle me-2">
                                        <div>
                                            <div class="fw-semibold">{{ $booking->customer_name }}</div>
                                            <small class="text-muted">{{ $booking->customer_email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $booking->flight_route['route'] }}</div>
                                    <small class="text-muted">{{ $booking->flight_route['stops'] }}</small>
                                </td>
                                <td>
                                    <div class="booking-details">
                                        <div class="fw-semibold">{{ $booking->flight_details['flight_number'] }}</div>
                                        <small class="text-muted">{{ $booking->flight_details['airline'] }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $booking->travel_date['date'] }}</div>
                                    <small class="text-muted">{{ $booking->travel_date['time'] }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $booking->passenger_count }}</span>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $booking->formatted_amount }}</div>
                                    <small class="text-muted">Total</small>
                                </td>
                                <td>
                                    <span class="badge-status {{ $booking->status_badge_class }}">
                                        {{ ucfirst($booking->booking_status_flag) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-status {{ $booking->payment_status_badge_class }}">
                                        {{ ucfirst($booking->booking_payment_state) }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ ucfirst($booking->booking_supplier_name) }}</small>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center py-4">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                        <h5 class="text-muted">No bookings found</h5>
                                        <p class="text-muted mb-0">Try adjusting your search criteria or filters.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($bookings->hasPages())
                <div class="pagination-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ number_format($bookings->total()) }} entries
                        </div>
                        <nav>
                            {{ $bookings->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
                @endif
            </div>
        </div>

 

@endsection