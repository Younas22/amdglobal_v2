@extends('admin.layouts.app')

@section('title', 'Travel Partner Management')

@section('content')
<div class="content-area p-4">
    <!-- Page Header -->
    <div class="page-header mb-4 d-none">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-1">Travel Partner Management</h2>
                <p class="text-muted mb-0">Manage API integrations, suppliers, and partner relationships across modules</p>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <button class="btn btn-primary modern-btn" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
                        <i class="bi bi-plus-circle"></i> Add New Partner
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MODULE SECTION ===== -->
    <div class="module-section mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">
                <i class="bi bi-layout-wtf me-2"></i>Supplier Modules
            </h5>
            <button class="btn btn-outline-primary btn-sm modern-btn d-none" data-bs-toggle="modal" data-bs-target="#addModuleModal">
                <i class="bi bi-plus"></i> New Module
            </button>
        </div>

        <!-- Module Cards Container -->
        <div class="module-cards-container" id="modulesContainer">
            @forelse($modules as $module)
                <div class="module-card" data-module-id="{{ $module->id }}" onclick="selectModule({{ $module->id }}, '{{ $module->name }}')">
                    <div class="module-header">
                        <div class="module-title">{{ $module->name }}</div>
                        <div class="module-actions">
                            <button class="module-toggle-btn" 
                                    data-module-id="{{ $module->id }}"
                                    onclick="toggleModuleStatus(event, {{ $module->id }})">
                                <span class="status-indicator {{ $module->status === 'active' ? 'status-active' : 'status-inactive' }}"></span>
                            </button>
                        </div>
                    </div>
                    <div class="module-body">
                        <div class="module-stat">
                            <div class="stat-label">Partners</div>
                            <div class="stat-value">{{ $module->partners_count }}</div>
                        </div>
                    </div>
                    <div class="module-footer">
                        <small class="text-muted">
                            @if($module->status === 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </small>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    No modules found. <a href="#" data-bs-toggle="modal" data-bs-target="#addModuleModal">Create one now</a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- ===== SUPPLIER SECTION ===== -->
    <div class="supplier-section">
        <!-- Stats Cards -->
        <div class="row g-4 mb-4 d-none">
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon icon-blue">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="ms-3">
                            <div class="small text-muted">Total Partners</div>
                            <div class="h4 mb-0" id="totalPartnersCount">{{ $stats['total_partners'] }}</div>
                            <div class="small text-success">
                                <i class="bi bi-arrow-up"></i> {{ $stats['new_this_month'] }} new this month
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon icon-green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="ms-3">
                            <div class="small text-muted">Active Partners</div>
                            <div class="h4 mb-0" id="activePartnersCount">{{ $stats['active_partners'] }}</div>
                            <div class="small text-success">
                                <i class="bi bi-arrow-up"></i>
                                <span id="activePartnersRate">{{ round(($stats['active_partners']/$stats['total_partners'])*100, 1) }}</span>% active rate
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon icon-orange">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ms-3">
                            <div class="small text-muted">Monthly Revenue</div>
                            <div class="h4 mb-0" id="monthlyRevenueAmount">${{ number_format($stats['monthly_revenue']) }}</div>
                            <div class="small text-success">
                                <i class="bi bi-arrow-up"></i>
                                <span id="revenueGrowthRate">{{ number_format($stats['revenue_growth'] ?? 0, 1) }}</span>% growth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon icon-purple">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="ms-3">
                            <div class="small text-muted">Avg Commission</div>
                            <div class="h4 mb-0" id="avgCommissionRate">{{ number_format($stats['avg_commission'] ?? 0, 1) }}%</div>
                            <div class="small text-info">
                                <i class="bi bi-arrow-right"></i> Industry standard
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="row g-4 mb-4 d-none">
            <div class="col-12">
                <div class="filter-card">
                    <form id="filterForm" method="GET" action="{{ route('admin.travel-partners.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">Search Partners</label>
                                <div class="search-container">
                                    <i class="bi bi-search"></i>
                                    <input type="text" name="search" class="form-control search-input"
                                           placeholder="Search by company name, API type..."
                                           value="{{ request('search') }}"
                                           id="searchInput">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Partner Tier</label>
                                <select name="tier" class="form-select" id="tierFilter">
                                    <option value="">All Tiers</option>
                                    <option value="standard" {{ request('tier') == 'standard' ? 'selected' : '' }}>Standard</option>
                                    <option value="premium" {{ request('tier') == 'premium' ? 'selected' : '' }}>Premium</option>
                                    <option value="enterprise" {{ request('tier') == 'enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">API Health</label>
                                <select name="api_health" class="form-select" id="healthFilter">
                                    <option value="">All Health</option>
                                    <option value="excellent" {{ request('api_health') == 'excellent' ? 'selected' : '' }}>Excellent (>95%)</option>
                                    <option value="good" {{ request('api_health') == 'good' ? 'selected' : '' }}>Good (85-95%)</option>
                                    <option value="poor" {{ request('api_health') == 'poor' ? 'selected' : '' }}>Poor (<85%)</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary modern-btn">
                                        <i class="bi bi-funnel"></i> Filter
                                    </button>
                                    <a href="{{ route('admin.travel-partners.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Partners Table -->
        <div class="col-12">
            <div class="partners-table">
                <div class="table-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <span id="moduleName">All</span> Partners 
                            <span class="badge bg-primary ms-2" id="partnerCountBadge">{{ $partners->total() }}</span>
                        </h5>
                        <div class="d-flex gap-2 d-none">
                            <div class="dropdown export-dropdown">
                                <button class="btn btn-outline-primary modern-btn dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-download"></i> Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-excel me-2"></i>Export as Excel</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text me-2"></i>Export as CSV</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf me-2"></i>Export as PDF</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="partnersTable">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input select-all-checkbox">
                                </th>
                                <th>Partner Details</th>
                                <th class="text-center">Commission</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="partnersTableBody">
                            @forelse ($partners as $partner)
                            <tr class="partner-row" data-partner-id="{{ $partner->id }}">
                                <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                                <td>
                                    <div class="partner-profile">
                                        <div class="partner-logo" style="background: {{ getRandomColor() }};">
                                            <img src="{{ asset('public/assets/images/partners/' . $partner->company_name . '.png') }}" 
                                                 alt="{{ $partner->company_name }}" 
                                                 onerror="this.style.display='none'">
                                            <!-- <span class="logo-text">{{ strtoupper(substr($partner->company_name, 0, 2)) }}</span> -->
                                        </div>
                                        <div class="partner-details">
                                            <div class="partner-name">{{ $partner->company_name }}</div>
                                            <div class="partner-type text-muted small">{{ $partner->api_type ?? 'N/A' }}</div>
                                            @if($partner->contract_end_date)
                                                <div class="contract-info small">
                                                    Contract: 
                                                    @if($partner->contract_end_date->diffInDays() <= 30)
                                                        <span class="badge bg-warning">Expiring Soon</span>
                                                    @else
                                                        {{ $partner->contract_end_date->format('M Y') }}
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="commission-info">
                                        <div class="commission-rate">{{ $partner->commission_rate }}%</div>
                                        <div class="commission-label">per booking</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-status status-{{ $partner->status }}">
                                        {{ ucfirst($partner->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons d-flex gap-1">
                                        <a class="btn btn-outline-secondary btn-sm" 
                                           data-bs-toggle="modal" 
                                           data-bs-target="#editPartnerModal_{{ $partner->id }}" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                                    data-bs-toggle="dropdown" title="More">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    @if($partner->status == 'active')
                                                    <a class="dropdown-item text-warning" href="#"
                                                       onclick="event.preventDefault(); suspendPartner({{ $partner->id }});">
                                                        <i class="bi bi-pause-circle"></i> Suspend
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success" href="#"
                                                       onclick="event.preventDefault(); activatePartner({{ $partner->id }});">
                                                        <i class="bi bi-play-circle"></i> Activate
                                                    </a>
                                                    @endif
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#"
                                                       onclick="event.preventDefault(); deletePartner({{ $partner->id }});">
                                                        <i class="bi bi-trash"></i> Remove
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Partner Modal for each partner -->
                            <div class="modal fade" id="editPartnerModal_{{ $partner->id }}" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">
                                                <i class="bi bi-pencil-square me-2"></i>Edit Partner: {{ $partner->company_name }}
                                            </h5>
                                            <button type="button" class="btn-close modern-btn" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.travel-partners.update', $partner->id) }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                                id="editPartnerForm_{{ $partner->id }}"
                                                class="modern-form">
                                                @csrf
                                                @method('PATCH')

                                                <div class="row">
                                                    <!-- Basic Information -->
                                                    <div class="col-md-12">
                                                        <h6 class="text-primary mb-3">
                                                            <i class="bi bi-info-circle me-1"></i>Basic Information
                                                        </h6>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Company Name</label>
                                                                    <input type="text" name="company_name" class="form-control" readonly 
                                                                           value="{{ $partner->company_name }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Commission (%)</label>
                                                                    <input type="number" name="commission_rate" class="form-control" 
                                                                           value="{{ $partner->commission_rate }}" min="0" max="100" step="0.1">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    <select class="form-select" name="status">
                                                                        <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="pending" {{ $partner->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="suspended" {{ $partner->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Type</label>
                                                                    <input type="text" name="supplier_type" class="form-control" readonly 
                                                                           value="{{ $partner->supplier_type ?? 'N/A' }}" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Development Mode</label>
                                                                    <div class="form-check form-switch">
                                                                        <input type="hidden" name="development_mode" value="0">
                                                                        <input class="form-check-input" type="checkbox" name="development_mode"
                                                                            id="editDevMode_{{ $partner->id }}" value="1" 
                                                                            {{ $partner->development_mode ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="editDevMode_{{ $partner->id }}">
                                                                            Enable Test Mode
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- API Configuration -->
                                                    <div class="col-md-12 mt-4">
                                                        <h6 class="text-primary mb-3">
                                                            <i class="bi bi-key me-1"></i>API Configuration
                                                        </h6>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 1</label>
                                                                    <input type="text" name="api_credential_1" class="form-control" 
                                                                           value="{{ $partner->api_credential_1 }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 2</label>
                                                                    <input type="text" name="api_credential_2" class="form-control" 
                                                                           value="{{ $partner->api_credential_2 }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 3</label>
                                                                    <input type="text" name="api_credential_3" class="form-control" 
                                                                           value="{{ $partner->api_credential_3 }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 4</label>
                                                                    <input type="text" name="api_credential_4" class="form-control" 
                                                                           value="{{ $partner->api_credential_4 }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 5</label>
                                                                    <input type="text" name="api_credential_5" class="form-control" 
                                                                           value="{{ $partner->api_credential_5 }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label">API Credential 6</label>
                                                                    <input type="text" name="api_credential_6" class="form-control" 
                                                                           value="{{ $partner->api_credential_6 }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary modern-btn" data-bs-dismiss="modal">Cancel</button>
                                            @if($partner->status == 'active')
                                                <button type="button" class="btn btn-outline-danger modern-btn"
                                                        onclick="suspendPartner({{ $partner->id }})">
                                                    Suspend Partner
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-outline-success modern-btn"
                                                        onclick="activatePartner({{ $partner->id }})">
                                                    Activate Partner
                                                </button>
                                            @endif
                                            <button type="submit" form="editPartnerForm_{{ $partner->id }}" class="btn btn-primary modern-btn">
                                                <i class="bi bi-check-lg"></i> Update Partner
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                    <p class="mt-2">No partners found matching your criteria</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Showing {{ $partners->firstItem() ?? 0 }} to {{ $partners->lastItem() ?? 0 }} of {{ $partners->total() }} entries
                        </div>
                        <nav>
                            {{ $partners->withQueryString()->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Module Modal -->
<div class="modal fade" id="addModuleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>Create New Module
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addModuleForm" class="modern-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Module Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g., Flight, Hotel, Visa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Module description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addModuleForm" class="btn btn-primary modern-btn">
                    <i class="bi bi-check-lg"></i> Create Module
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>Add New Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addPartnerForm" class="modern-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Module</label>
                                <select name="module_id" class="form-select" required>
                                    <option value="">Select a module</option>
                                    @foreach($modules as $module)
                                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Commission Rate (%)</label>
                                <input type="number" name="commission_rate" class="form-control" min="0" max="100" step="0.1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="suspended">Suspended</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="addPartnerForm" class="btn btn-primary modern-btn">
                    <i class="bi bi-check-lg"></i> Add Partner
                </button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
/* ===== MODULE CARDS ===== */

.module-cards-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);  /* 3 cards per row */
    gap: 0.75rem;  /* Reduced gap */
    margin-bottom: 1.5rem;
}

.module-card {
    background: white;
    border: 1.5px solid #e5e7eb;  /* Thinner border */
    border-radius: 8px;            /* Slightly smaller radius */
    padding: 0.75rem;              /* Reduced padding */
    cursor: pointer;
    transition: all 0.25s ease;
    position: relative;
    overflow: hidden;
    min-height: 100px;             /* Tighter card height */
}

.module-card:hover {
    border-color: #3b82f6;
    box-shadow: 0 3px 12px rgba(59, 130, 246, 0.1);
    transform: translateY(-1px);
}

.module-card.selected {
    border-color: #3b82f6;
    background: linear-gradient(135deg, #f0f7ff 0%, white 100%);
    box-shadow: 0 3px 12px rgba(59, 130, 246, 0.15);
}

.module-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;  /* Reduced margin */
}

.module-title {
    font-size: 0.9rem;  /* Smaller font */
    font-weight: 600;
    color: #1f2937;
    flex: 1;
}

.module-actions {
    margin-left: 0.25rem;
}

.module-toggle-btn {
    background: white;
    border: 1.5px solid #e5e7eb;
    padding: 0.25rem;
    cursor: pointer;
    border-radius: 50%;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px;  /* Smaller size */
    height: 28px;
    min-width: 28px;
}

.module-toggle-btn:hover {
    transform: scale(1.1);
    border-color: #3b82f6;
    background-color: #f0f7ff;
}

.status-indicator {
    display: inline-block;
    width: 12px;  /* Smaller size */
    height: 12px;
    border-radius: 50%;
    animation: pulse 2s infinite;
}

.status-active {
    background-color: #10b981;
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.1);
}

.status-inactive {
    background-color: #6b7280;
    box-shadow: 0 0 0 2px rgba(107, 114, 128, 0.1);
}

.module-body {
    margin-bottom: 0.5rem;
}

.module-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.stat-label {
    font-size: 0.75rem;  /* Smaller font */
    color: #6b7280;
    margin-bottom: 0.15rem;
}

.stat-value {
    font-size: 1.25rem;  /* Smaller font */
    font-weight: 700;
    color: #3b82f6;
}

.module-footer {
    padding-top: 0.5rem;  /* Reduced padding */
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: center;
}


/* ===== RESPONSIVE ===== */
@media (max-width: 1200px) {
    .module-cards-container {
        grid-template-columns: repeat(2, 1fr);  /* 2 columns on tablets */
    }
}

@media (max-width: 768px) {
    .module-cards-container {
        grid-template-columns: 1fr;  /* 1 column on mobile */
        gap: 0.75rem;
    }

    .module-card {
        padding: 0.8rem;
    }

    .module-title {
        font-size: 0.95rem;
    }
}
    /* ===== PARTNER CARDS ===== */
    .partner-profile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

.partner-logo {
    position: relative;
    width: 60px;       /* adjust size as needed */
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1rem;
    color: white;
    text-transform: uppercase;
    text-align: center;
    background-color: #ccc; /* fallback bg */
}

.partner-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;  /* fill circle entirely */
    display: block;
    position: absolute;
    top: 0;
    left: 0;
}

.partner-logo .logo-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
    display: flex;
    align-items: center;
    justify-content: center;
}



    .partner-details {
        flex: 1;
        min-width: 0;
    }

    .partner-name {
        font-weight: 600;
        color: #1f2937;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .partner-type {
        font-size: 0.875rem;
    }

    .contract-info {
        margin-top: 0.25rem;
    }

    .commission-info {
        text-align: center;
    }

    .commission-rate {
        font-size: 1.25rem;
        font-weight: 700;
        color: #3b82f6;
    }

    .commission-label {
        font-size: 0.75rem;
        color: #6b7280;
    }

    /* ===== STATUS BADGES ===== */
    .badge-status {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        text-transform: capitalize;
        display: inline-block;
    }

    .status-active {
        background-color: #d1fae5;
        color: #065f46;
    }

    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-suspended {
        background-color: #fee2e2;
        color: #b91c1c;
    }

    /* ===== STATS CARDS ===== */
    .stats-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
    }

    .icon-blue {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .icon-green {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .icon-orange {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .icon-purple {
        background: linear-gradient(135deg, #a855f7, #7e22ce);
    }

    /* ===== TABLE STYLES ===== */
    .partners-table {
        background: white;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .table-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        background-color: #f9fafb;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .modern-btn {
        transition: all 0.2s ease;
    }

    .modern-btn:hover {
        transform: translateY(-1px);
    }

    /* ===== FILTER CARD ===== */
    .filter-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
    }

    .search-container {
        position: relative;
    }

    .search-container i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
    }

    .search-input {
        padding-left: 36px;
    }

    /* ===== PAGINATION ===== */
    .pagination-container {
        padding: 1.5rem;
        border-top: 1px solid #e5e7eb;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .module-cards-container {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }

        .table-responsive {
            font-size: 0.875rem;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    const BASE_URL = "{{ url('') }}";
    // Store current selected module
    let selectedModuleId = null;

    // Select module function
    function selectModule(moduleId, moduleName) {
        selectedModuleId = moduleId;
        
        // Update active card styling
        document.querySelectorAll('.module-card').forEach(card => {
            card.classList.remove('selected');
        });
        document.querySelector(`[data-module-id="${moduleId}"]`).classList.add('selected');

        // Update page title
        document.getElementById('moduleName').textContent = moduleName;

        // Fetch and display partners for this module
        fetchModulePartners(moduleId);
    }

    // Fetch partners for selected module
    function fetchModulePartners(moduleId) {
        fetch(`${BASE_URL}/admin/travel-partners/module/${moduleId}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updatePartnersTable(data.partners, data.stats);
                updateStats(data.stats);
            }
        })
        .catch(error => {
            console.error('Error fetching partners:', error);
            alert('Error loading partners. Please try again.');
        });
    }

    // Update partners table
    function updatePartnersTable(partners, stats) {
        const tbody = document.getElementById('partnersTableBody');
        
        if (partners.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-4">
                        <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                        <p class="mt-2">No partners found in this module</p>
                    </td>
                </tr>
            `;
            document.getElementById('partnerCountBadge').textContent = '0';
            return;
        }

        let html = '';
        partners.forEach(partner => {
            const statusClass = `status-${partner.status}`;
            const statusText = partner.status.charAt(0).toUpperCase() + partner.status.slice(1);
            
            html += `
                <tr class="partner-row" data-partner-id="${partner.id}">
                    <td><input type="checkbox" class="form-check-input row-checkbox"></td>
                    <td>
                        <div class="partner-profile">
                            <div class="partner-logo" style="background: ${getRandomColor()};">
                                <span class="logo-text">${partner.company_name.substring(0, 2).toUpperCase()}</span>
                            </div>
                            <div class="partner-details">
                                <div class="partner-name">${partner.company_name}</div>
                                <div class="partner-type text-muted small">${partner.api_type || 'N/A'}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="commission-info">
                            <div class="commission-rate">${partner.commission_rate}%</div>
                            <div class="commission-label">per booking</div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-status ${statusClass}">
                            ${statusText}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons d-flex gap-1">
                            <a class="btn btn-outline-secondary btn-sm" href="#" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" title="More">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item text-${partner.status === 'active' ? 'warning' : 'success'}" href="#"
                                           onclick="event.preventDefault(); ${partner.status === 'active' ? 'suspendPartner' : 'activatePartner'}(${partner.id});">
                                            <i class="bi bi-${partner.status === 'active' ? 'pause-circle' : 'play-circle'}"></i> 
                                            ${partner.status === 'active' ? 'Suspend' : 'Activate'}
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="#"
                                           onclick="event.preventDefault(); deletePartner(${partner.id});">
                                            <i class="bi bi-trash"></i> Remove
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
        document.getElementById('partnerCountBadge').textContent = partners.length;
    }

    // Update statistics
    function updateStats(stats) {
        document.getElementById('totalPartnersCount').textContent = stats.total_partners;
        document.getElementById('activePartnersCount').textContent = stats.active_partners;
        document.getElementById('activePartnersRate').textContent = stats.active_rate?.toFixed(1) || '0';
        document.getElementById('monthlyRevenueAmount').textContent = '$' + formatNumber(stats.monthly_revenue);
        document.getElementById('revenueGrowthRate').textContent = (stats.revenue_growth || 0).toFixed(1);
        document.getElementById('avgCommissionRate').textContent = (stats.avg_commission || 0).toFixed(1);
    }

    // Format numbers
    function formatNumber(num) {
        return new Intl.NumberFormat().format(Math.round(num));
    }

    // Get random color
    function getRandomColor() {
        const colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899'];
        return colors[Math.floor(Math.random() * colors.length)];
    }

    // Toggle module status
    function toggleModuleStatus(event, moduleId) {
        event.stopPropagation();
        
        fetch(`${BASE_URL}/admin/modules/${moduleId}/update-status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Partner actions
    function suspendPartner(partnerId) {
        if (confirm('Are you sure you want to suspend this partner?')) {
            fetch(`${BASE_URL}/admin/travel-partners/suspend/${partnerId}`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }

    function activatePartner(partnerId) {
        if (confirm('Are you sure you want to activate this partner?')) {
            fetch(`${BASE_URL}/admin/travel-partners/activate/${partnerId}`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }

    function deletePartner(partnerId) {
        if (confirm('Are you sure you want to delete this partner? This action cannot be undone.')) {
            fetch(`${BASE_URL}/admin/travel-partners/destroy/${partnerId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }

    // Add Module Form
    document.getElementById('addModuleForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('{{ route("admin.modules.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Add Partner Form
    document.getElementById('addPartnerForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('{{ route("admin.travel-partners.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Select all checkboxes
    const selectAllCheckbox = document.querySelector('.select-all-checkbox');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            document.querySelectorAll('.row-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush


@endsection
