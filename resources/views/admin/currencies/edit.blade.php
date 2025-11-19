@extends('admin.layouts.app')

@section('title', 'Edit Currency')

@section('styles')
    <style>
        .form-group { margin-bottom: 1.5rem; }
        .card { box-shadow: 0 0 20px rgba(0,0,0,0.1); border: none; border-radius: 10px; }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
        }
        .btn-secondary { padding: 10px 25px; border-radius: 25px; }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="fas fa-edit me-2"></i>Edit Currency
                        </h3>
                        <a href="{{ route('admin.currencies.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back to Currency List
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.currencies.update', $currency->id) }}" method="POST" id="editcurrencyForm">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-8">

                                    {{-- Currency Name --}}
                                    <div class="form-group mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-heading me-1"></i>Currency Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="currency_name"
                                               class="form-control @error('currency_name') is-invalid @enderror"
                                               value="{{ old('currency_name', $currency->currency_name) }}"
                                               required placeholder="Enter Currency Name">
                                        @error('currency_name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    {{-- Currency Country --}}
                                    <div class="form-group mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-flag me-1"></i>Country Name <span class="text-danger">*</span>
                                        </label>

                                        <select name="currency_country"
                                                class="form-control @error('currency_country') is-invalid @enderror"
                                                required>

                                            <option value="">Select Country</option>

                                            @foreach(['Pakistan','USA','UK','UAE','Saudi Arabia','India','Canada'] as $country)
                                                <option value="{{ $country }}"
                                                    {{ old('currency_country', $currency->currency_country) == $country ? 'selected' : '' }}>
                                                    {{ $country }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('currency_country')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    {{-- Currency Status --}}
                                    <div class="form-group mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-toggle-on me-1"></i>Status <span class="text-danger">*</span>
                                        </label>

                                        <select name="currency_status"
                                                class="form-control @error('currency_status') is-invalid @enderror"
                                                required>

                                            <option value="1" {{ old('currency_status', $currency->currency_status) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0" {{ old('currency_status', $currency->currency_status) == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>

                                        @error('currency_status')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    {{-- Default hidden --}}
                                    <input type="hidden" name="currency_default" value="{{ isset($currency) && $currency->currency_default ? '1' : '0' }}">

                                    {{-- Currency Rate --}}
                                    <div class="form-group mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-dollar-sign me-1"></i>Currency Rate <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" step="0.01"
                                               name="currency_rate"
                                               class="form-control @error('currency_rate') is-invalid @enderror"
                                               value="{{ old('currency_rate', $currency->currency_rate) }}"
                                               required placeholder="Enter Currency Rate">

                                        @error('currency_rate')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid #dee2e6;">
                                        <div>
                                            <button type="button" class="btn btn-secondary me-2" onclick="window.location='{{ route('admin.currencies.index') }}'">
                                                <i class="fas fa-times me-1"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i> Update Currency
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        const editcurrencyForm = document.getElementById('editcurrencyForm');

        if (editcurrencyForm) {
            editcurrencyForm.addEventListener('submit', function(e) {

                const currencyName = document.querySelector('[name="currency_name"]').value.trim();
                const currencyCountry = document.querySelector('[name="currency_country"]').value.trim();
                const currencyStatus = document.querySelector('[name="currency_status"]').value.trim();
                const currencyRate = document.querySelector('[name="currency_rate"]').value.trim();

                if (!currencyName) {
                    e.preventDefault();
                    alert('Please enter the currency name.');
                    document.querySelector('[name="currency_name"]').focus();
                    return;
                }

                if (!currencyCountry) {
                    e.preventDefault();
                    alert('Please select a country.');
                    document.querySelector('[name="currency_country"]').focus();
                    return;
                }

                if (currencyStatus === "") {
                    e.preventDefault();
                    alert('Please select currency status.');
                    document.querySelector('[name="currency_status"]').focus();
                    return;
                }

                if (!currencyRate || isNaN(currencyRate) || Number(currencyRate) <= 0) {
                    e.preventDefault();
                    alert('Please enter a valid currency rate.');
                    document.querySelector('[name="currency_rate"]').focus();
                    return;
                }

                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Updating...';
                    submitButton.disabled = true;
                }
            });
        }
    </script>

@endpush
