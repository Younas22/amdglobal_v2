{{-- resources/views/admin/currencies/index.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Currencies Management')

@section('content')



    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">
                <i class="bi bi-currency-exchange me-2"></i> Currencies
            </h4>

            <a href="{{ route('admin.currencies.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add New Currency
            </a>
        </div>

        {{-- Stats Section --}}
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="stats-icon text-primary mb-2">
                            <i class="bi bi-currency-exchange fs-3"></i>
                        </div>
                        <h6 class="text-muted">Total Currencies</h6>
                        <h4 class="mb-0">{{ $stats['total'] }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="stats-icon text-success mb-2">
                            <i class="bi bi-check-circle fs-3"></i>
                        </div>
                        <h6 class="text-muted">Active</h6>
                        <h4 class="mb-0">{{ $stats['active'] }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="stats-icon text-danger mb-2">
                            <i class="bi bi-x-circle fs-3"></i>
                        </div>
                        <h6 class="text-muted">Inactive</h6>
                        <h4 class="mb-0">{{ $stats['inactive'] }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="stats-icon text-warning mb-2">
                            <i class="bi bi-star-fill fs-3"></i>
                        </div>
                        <h6 class="text-muted">Default</h6>
                        <h4 class="mb-0">{{ $stats['default'] }}</h4>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bulk Actions Bar -->
        <div class="alert alert-info d-flex justify-content-between align-items-center" id="bulkActionsBar" style="display: none;">
            <div>
                <strong><span id="selectedCount">0</span></strong> pages selected
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-danger btn-sm" onclick="bulkAction('delete')">
                    <i class="bi bi-trash"></i> Delete
                </button>
                <button class="btn btn-outline-secondary btn-sm" onclick="clearSelection()">
                    Cancel
                </button>
            </div>
        </div>

    {{-- Table Section --}}
        <div class="pages-table">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>
                            <input type="checkbox" class="form-check-input" id="selectAll" onchange="toggleSelectAll()">
                        </th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Default</th>
                        <th>Status</th>
                        <th>Rate</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($currencies as $currency)
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input page-checkbox"
                                       value="{{ $currency->id }}" onchange="updateSelection()">
                            </td>
                            <td>
                                <div class="page-info">
                                    <div class="d-flex align-items-center">
                                        <div class="page-details">
                                            <h6 class="mb-1">
                                                {{ $currency->currency_name  }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                            <span>{{ ucfirst($currency->currency_country) }}</span>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-default" type="checkbox"
                                           data-id="{{ $currency->id }}"
                                        {{ $currency->currency_default ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox"
                                           data-id="{{ $currency->id }}"
                                        {{ $currency->currency_status  ? 'checked' : '' }}>
                                </div>

                            </td>
                            <td>
                                <span>{{ $currency->currency_rate }}</span>
                            </td>

                            <td>
                                <div class="action-buttons d-flex gap-1">
                                    <!-- View Button -->
                                    @if($currency->status === 1)
                                        <a href="" target="_blank" class="btn btn-outline-info btn-sm" title="View Page">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    @endif

                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.currencies.edit', $currency->id) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @unless($currency->currency_name == "USD")
                                    <button class="btn btn-outline-danger btn-sm" title="Delete"
                                            onclick="deleteCurrceny({{ $currency->id }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endunless
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                    <p class="mt-2">No pages found</p>
                                    <a href="" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i> Create First Page
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($currencies->hasPages())
                <div class="pagination-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Showing {{ $currencies->firstItem() }} to {{ $currencies->lastItem() }} of {{ $currencies->total() }} entries
                        </div>
                        <nav>
                            {{ $currencies->withQueryString()->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Bulk selection functionality
        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.page-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });

            updateSelection();
        }

        function updateSelection() {
            const checkboxes = document.querySelectorAll('.page-checkbox:checked');
            const count = checkboxes.length;

            document.getElementById('selectedCount').textContent = count;
            document.getElementById('bulkActionsBar').style.display = count > 0 ? 'flex' : 'none';
            document.getElementById('bulkDeleteBtn').style.display = count > 0 ? 'inline-block' : 'none';
        }

        function clearSelection() {
            const checkboxes = document.querySelectorAll('.page-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
            document.getElementById('selectAll').checked = false;
            updateSelection();
        }

        // Bulk actions
        function bulkAction(action) {
            const checkboxes = document.querySelectorAll('.page-checkbox:checked');
            if (checkboxes.length === 0) {
                alert('Please select pages first');
                return;
            }

            const pageIds = Array.from(checkboxes).map(cb => cb.value);

            if (confirm(`Are you sure you want to ${action} ${pageIds.length} page(s)?`)) {
                fetch('', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        action: action,
                        page_ids: pageIds
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification(data.message, 'success');
                            location.reload();
                        } else {
                            showNotification(data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred', 'error');
                    });
            }
        }

        // Individual page actions
        function changePageStatus(pageId, action) {
            if (confirm(`Are you sure you want to ${action} this page?`)) {
                fetch('', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        action: action,
                        page_ids: [pageId]
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotification(data.message, 'success');
                            location.reload();
                        } else {
                            showNotification(data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred', 'error');
                    });
            }
        }

        function deleteCurrceny(cid) {
            if (confirm('Are you sure you want to delete this currency? This action cannot be undone.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('/admin/currencies') }}/${cid}`;
                form.innerHTML = `
            @csrf
                @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }


        function showNotification(message, type = 'success') {
            alert(message);
        }

        document.querySelectorAll('.toggle-default').forEach(function(switchBtn) {
            switchBtn.addEventListener('change', function() {
                let currencyId = this.dataset.id;
                let isDefault = this.checked ? 1 : 0;

                if(isDefault) {
                    if(!confirm('Are you sure you want to set this currency as default?')) {
                        this.checked = false;
                        return;
                    }
                }

                fetch('{{ route("admin.currencies.toggle_default") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        id: currencyId,
                        currency_default: isDefault
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            location.reload();
                        } else {
                            alert(data.message);
                            this.checked = !isDefault;
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('An error occurred');
                        this.checked = !isDefault;
                    });
            });
        });

        document.querySelectorAll('.toggle-status').forEach(function(switchBtn) {
            switchBtn.addEventListener('change', function() {
                let currencyId = this.dataset.id;
                let isDefault = this.checked ? 1 : 0;

                if(isDefault) {
                    if(!confirm('Are you sure you want to set this currency active?')) {
                        this.checked = false;
                        return;
                    }
                }

                fetch('{{ route("admin.currencies.toggle_status") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        id: currencyId,
                        currency_active: isDefault
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            location.reload();
                        } else {
                            alert(data.message);
                            this.checked = !isDefault;
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('An error occurred');
                        this.checked = !isDefault;
                    });
            });
        });
    </script>
@endsection
