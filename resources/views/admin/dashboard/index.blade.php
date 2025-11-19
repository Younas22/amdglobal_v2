@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Content Area -->
<div class="content-area">
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon icon-blue">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="ms-3">
                        <div class="small text-muted">Total Bookings</div>
                        <div class="h4 mb-0">{{ number_format($stats['total_bookings']) }}</div>
                        <div class="small text-success">
                            <i class="bi bi-arrow-up"></i>{{ ($stats['total_bookings'] ?? 0) > 0? number_format(($stats['confirmed_bookings'] / $stats['total_bookings']) * 100, 1): 0}}% confirmed
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon icon-green">
                        <i class="bi bi-passport"></i>
                    </div>
                    <div class="ms-3">
                        <div class="small text-muted">Visa Requests</div>
                        <div class="h4 mb-0">{{ number_format($stats['total_visarequest']) }}</div>
                        <div class="small text-success">
                            <i class="bi bi-arrow-up"></i> {{ number_format($stats['total_visarequest']) }} this month
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon icon-orange">
                        <i class="bi bi-file"></i>
                    </div>
                    <div class="ms-3">
                        <div class="small text-muted">Total Blogs</div>
                        <div class="h4 mb-0">{{ number_format($stats['blogs_count']) }}</div>
                        <div class="small text-warning">
                            <i class="bi bi-arrow-right"></i> {{ $stats['new_blogs_this_month'] }} new
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stats-card">
                <div class="d-flex align-items-center">
                    <div class="stats-icon icon-purple">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ms-3">
                        <div class="small text-muted">Total Subscribers</div>
                        <div class="h4 mb-0">{{ number_format($stats['NewsletterSubscriber']) }}</div>
                        <div class="small text-success">
                            <i class="bi bi-arrow-up"></i> {{ $stats['new_subscriber_this_month'] }} new
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row g-4">
    <!-- Recent Bookings -->
    <div class="col-xl-8">
        <div class="recent-bookings-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-content">
                        <h5 class="mb-0">Recent Bookings</h5>
                        <small class="text-muted">Latest flight reservations</small>
                    </div>
                    <a href="{{ route('admin.bookings.all') }}" class="btn btn-outline-primary btn-sm modern-btn">
                        View All
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0 compact-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer</th>
                            <th>Flight</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_bookings as $booking)
                        <tr>
                            <td>
                                <a href="{{ url('flight/invoice', $booking->booking_code_ref) }}" class="booking-link">
                                    <span class="booking-id">#{{ $booking->booking_code_ref }}</span>
                                </a>
                                <div class="booking-date">{{ $booking->created_at->format('M j') }}</div>
                            </td>
                            <td>
                                <div class="customer-compact">
                                    @php
                                        $initials = collect(explode(' ', $booking->customer_name))->map(function($name) {
                                            return strtoupper(substr($name, 0, 1));
                                        })->take(2)->implode('');
                                        $colors = ['4f46e5', '059669', 'dc2626', 'b45309', 'c2410c'];
                                        $color = $colors[crc32($booking->customer_name) % count($colors)];
                                    @endphp
                                    <div class="avatar-sm" style="background: #{{ $color }}22; color: #{{ $color }};">
                                        {{ $initials }}
                                    </div>
                                    <div class="customer-text">
                                        <div class="customer-name">{{ Str::limit($booking->customer_name, 20) }}</div>
                                        <div class="customer-email">{{ Str::limit($booking->customer_email, 25) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flight-compact">
                                    <div class="route-info">{{ $booking->flight_route['route'] }}</div>
                                    <div class="flight-meta">
                                        <span class="stops-badge">{{ $booking->flight_route['stops'] }}</span>
                                        <span class="date-info">{{ $booking->travel_date['date'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="amount-compact">
                                    <div class="price">{{ $booking->formatted_amount }}</div>
                                    <div class="passengers">{{ $booking->passenger_count }}</div>
                                </div>
                            </td>
                            <td>
                                <span class="status-compact status-{{ $booking->booking_status_flag }}">
                                    {{ ucfirst($booking->booking_status_flag) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div class="empty-state-compact">
                                    <i class="bi bi-calendar-x text-muted"></i>
                                    <div class="mt-2">
                                        <small class="text-muted">No recent bookings</small>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-xl-4">
        <div class="quick-actions-card">
            <div class="card-header">
                <h5 class="mb-1">Quick Actions</h5>
                <p class="text-muted mb-0">Common administrative tasks</p>
            </div>

            <div class="actions-grid">
                <a href="{{ route('admin.travel-partners.index') }}" class="action-item">
                    <div class="action-icon partners">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Travel Partners</div>
                        <div class="action-description">Manage partnerships</div>
                    </div>
                    <div class="action-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>

                <a href="{{ route('admin.visa-requests.visaindex') }}" class="action-item">
                    <div class="action-icon visa">
                        <i class="bi bi-passport"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Visa Requests</div>
                        <div class="action-description">Review applications</div>
                    </div>
                    <div class="action-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>

                <a href="{{ route('admin.content.blog.create') }}" class="action-item">
                    <div class="action-icon blog">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">Create Blog Post</div>
                        <div class="action-description">Write new article</div>
                    </div>
                    <div class="action-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>

                <a href="{{ route('admin.settings.website') }}" class="action-item">
                    <div class="action-icon settings">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="action-content">
                        <div class="action-title">System Settings</div>
                        <div class="action-description">Configure platform</div>
                    </div>
                    <div class="action-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Card Design */
.recent-bookings-card,
.quick-actions-card {
    background: var(--bs-body-bg, white);
    border: 1px solid var(--bs-border-color, #e5e7eb);
    border-radius: 16px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.recent-bookings-card:hover,
.quick-actions-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

/* Card Headers */
.card-header {
    padding: 24px 24px 20px 24px;
    background: var(--bs-secondary-bg, #f8f9fa);
    border-bottom: 1px solid var(--bs-border-color, #e5e7eb);
}

.header-content h5 {
    color: var(--bs-body-color, #1f2937);
    font-weight: 600;
}

/* Compact Table Design */
.compact-table {
    font-size: 13px;
}

.compact-table th {
    border: none;
    background: transparent;
    font-weight: 600;
    color: var(--bs-secondary-color, #6b7280);
    padding: 12px 16px;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    height: 45px;
}

.compact-table td {
    padding: 12px 16px;
    border-top: 1px solid var(--bs-border-color, #f1f3f4);
    vertical-align: middle;
    height: 65px;
}

.compact-table tbody tr {
    transition: all 0.2s ease;
}

.compact-table tbody tr:hover {
    background: var(--bs-tertiary-bg, #f8f9fa);
}

/* Compact Booking Link */
.booking-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.booking-id {
    font-weight: 600;
    color: var(--bs-primary, #4f46e5);
    font-size: 13px;
    display: block;
}

.booking-date {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 11px;
    margin-top: 2px;
}

/* Compact Customer */
.customer-compact {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 12px;
    flex-shrink: 0;
}

.customer-text {
    min-width: 0;
    flex: 1;
}

.customer-name {
    font-weight: 500;
    color: var(--bs-body-color, #1f2937);
    font-size: 13px;
    line-height: 1.3;
    margin-bottom: 2px;
}

.customer-email {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 11px;
    line-height: 1.2;
}

/* Compact Flight Info */
.flight-compact {
    min-width: 0;
}

.route-info {
    font-weight: 500;
    color: var(--bs-body-color, #1f2937);
    font-size: 13px;
    margin-bottom: 4px;
    line-height: 1.3;
}

.flight-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.stops-badge {
    background: var(--bs-primary-bg-subtle, #e0e7ff);
    color: var(--bs-primary-text-emphasis, #4338ca);
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 10px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.date-info {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 11px;
    font-weight: 400;
}

/* Compact Amount */
.amount-compact {
    text-align: right;
}

.price {
    font-weight: 600;
    color: var(--bs-body-color, #1f2937);
    font-size: 13px;
    margin-bottom: 2px;
}

.passengers {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Compact Status */
.status-compact {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 500;
    text-transform: capitalize;
    letter-spacing: 0.3px;
}

.status-confirmed {
    background: #dcfce7;
    color: #166534;
}

.status-pending {
    background: #fef3c7;
    color: #92400e;
}

.status-cancelled {
    background: #fecaca;
    color: #991b1b;
}

/* Compact Empty State */
.empty-state-compact {
    padding: 30px 20px;
    text-align: center;
}

.empty-state-compact i {
    font-size: 32px;
    margin-bottom: 8px;
    opacity: 0.5;
}

/* Card Header Compact */
.card-header {
    padding: 18px 20px;
    background: var(--bs-secondary-bg, #f8f9fa);
    border-bottom: 1px solid var(--bs-border-color, #e5e7eb);
}

.header-content h5 {
    color: var(--bs-body-color, #1f2937);
    font-weight: 600;
    font-size: 16px;
}

.header-content small {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 12px;
}

/* Modern Button Compact */
.modern-btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 6px 12px;
    font-size: 12px;
    transition: all 0.2s ease;
    border: 1.5px solid var(--bs-primary, #4f46e5);
    display: flex;
    align-items: center;
    gap: 4px;
}

.modern-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(79, 70, 229, 0.3);
}

/* Quick Actions */
.actions-grid {
    padding: 8px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.action-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: all 0.2s ease;
    border: 1px solid transparent;
}

.action-item:hover {
    background: var(--bs-tertiary-bg, #f1f5f9);
    color: inherit;
    transform: translateX(4px);
    border-color: var(--bs-border-color, #e2e8f0);
}

.action-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.action-icon.partners {
    background: linear-gradient(135deg, #3b82f622, #3b82f644);
    color: #3b82f6;
}

.action-icon.visa {
    background: linear-gradient(135deg, #10b98122, #10b98144);
    color: #10b981;
}

.action-icon.blog {
    background: linear-gradient(135deg, #f59e0b22, #f59e0b44);
    color: #f59e0b;
}

.action-icon.settings {
    background: linear-gradient(135deg, #8b5cf622, #8b5cf644);
    color: #8b5cf6;
}

.action-content {
    flex: 1;
}

.action-title {
    font-weight: 600;
    color: var(--bs-body-color, #1f2937);
    font-size: 14px;
    margin-bottom: 2px;
}

.action-description {
    color: var(--bs-secondary-color, #6b7280);
    font-size: 12px;
}

.action-arrow {
    color: var(--bs-secondary-color, #9ca3af);
    font-size: 16px;
    transition: all 0.2s ease;
}

.action-item:hover .action-arrow {
    color: var(--bs-primary, #4f46e5);
    transform: translateX(2px);
}

/* Modern Button */
.modern-btn {
    border-radius: 10px;
    font-weight: 500;
    padding: 8px 16px;
    transition: all 0.2s ease;
    border: 1.5px solid var(--bs-primary, #4f46e5);
    display: flex;
    align-items: center;
    gap: 6px;
}

.modern-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
}

/* Dark Mode Support */
[data-bs-theme="dark"] .recent-bookings-card,
[data-bs-theme="dark"] .quick-actions-card {
    background: var(--bs-dark, #1f2937);
    border-color: var(--bs-border-color-translucent, #374151);
}

[data-bs-theme="dark"] .card-header {
    background: var(--bs-tertiary-bg, #374151);
    border-bottom-color: var(--bs-border-color-translucent, #4b5563);
}

[data-bs-theme="dark"] .compact-table td {
    border-top-color: var(--bs-border-color-translucent, #374151);
}

[data-bs-theme="dark"] .compact-table tbody tr:hover {
    background: var(--bs-tertiary-bg, #374151);
}

[data-bs-theme="dark"] .action-item:hover {
    background: var(--bs-tertiary-bg, #374151);
    border-color: var(--bs-border-color-translucent, #4b5563);
}

[data-bs-theme="dark"] .stops-badge {
    background: var(--bs-primary-bg-subtle, #1e293b);
    color: var(--bs-primary-text-emphasis, #93c5fd);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .actions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }
}

@media (max-width: 768px) {
    .card-header {
        padding: 16px;
    }

    .compact-table th,
    .compact-table td {
        padding: 10px 12px;
        font-size: 12px;
    }

    .compact-table td {
        height: 60px;
    }

    .actions-grid {
        grid-template-columns: 1fr;
        padding: 4px;
    }

    .customer-compact {
        gap: 8px;
    }

    .avatar-sm {
        width: 28px;
        height: 28px;
        font-size: 11px;
    }

    .action-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }

    .booking-id {
        font-size: 12px;
    }

    .customer-name,
    .route-info,
    .price {
        font-size: 12px;
    }

    .flight-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 2px;
    }
}

@media (max-width: 576px) {
    .compact-table {
        font-size: 11px;
    }

    .compact-table th {
        padding: 8px 10px;
        font-size: 10px;
    }

    .compact-table td {
        padding: 8px 10px;
        height: 55px;
    }

    .card-header {
        padding: 14px;
    }

    .header-content h5 {
        font-size: 15px;
    }

    .modern-btn {
        padding: 5px 10px;
        font-size: 11px;
    }

    .customer-name {
        font-size: 11px;
    }

    .customer-email {
        font-size: 10px;
    }

    .route-info {
        font-size: 11px;
    }

    .price {
        font-size: 11px;
    }

    .status-compact {
        padding: 3px 8px;
        font-size: 10px;
    }
}
</style>
</div>
@endsection
