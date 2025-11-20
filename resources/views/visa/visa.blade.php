@extends('common.layout')
@section('content')

    <div class="flight-container">
        <!-- Form Header -->
        <div class="page-header">
            <h1>Visa Request Form</h1>
            <p>Please fill out all required fields marked with <strong>*</strong></p>
        </div>

        <!-- Form Wrapper -->
        <form action="{{ route('visa.store') }}" method="POST" enctype="multipart/form-data" class="form-wrapper- contact-info">
            @csrf

            <!-- Visa Type Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-passport"></i> Visa Information
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Visa Type</label>
                        <select class="form-select" name="visa_type" required>
                            <option value="">Select Visa Type</option>
                            <option value="tourist">Tourist Visa</option>
                            <option value="business">Business Visa</option>
                            <option value="student">Student Visa</option>
                            <option value="work">Work Visa</option>
                            <option value="family">Family Visa</option>
                            <option value="transit">Transit Visa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Visa Plan</label>
                        <select class="form-select" name="visa_plan" required>
                            <option value="">Select Plan</option>
                            <option value="single_entry">Single Entry</option>
                            <option value="multiple_entry">Multiple Entry</option>
                            <option value="30_days">30 Days</option>
                            <option value="60_days">60 Days</option>
                            <option value="90_days">90 Days</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Passenger Details Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-user"></i> Passenger Details
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">First Name</label>
                        <input type="text" name="first_name" class="form-input" placeholder="Enter first name" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-input" placeholder="Enter middle name (optional)" value="{{ old('middle_name') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Surname</label>
                        <input type="text" name="surname" class="form-input" placeholder="Enter surname" value="{{ old('surname') }}" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Father's Name</label>
                        <input type="text" name="father_name" class="form-input" placeholder="Enter father's name" value="{{ old('father_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Mother's Name</label>
                        <input type="text" name="mother_name" class="form-input" placeholder="Enter mother's name" value="{{ old('mother_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Place of Birth</label>
                        <input type="text" name="place_birth" class="form-input" placeholder="Enter place of birth" value="{{ old('place_birth') }}" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Occupation</label>
                        <input type="text" name="occupation" class="form-input" placeholder="Enter occupation" value="{{ old('occupation') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Religion</label>
                        <input type="text" name="religion" class="form-input" placeholder="Enter religion" value="{{ old('religion') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Marital Status</label>
                        <select class="form-select" name="marital_status" required>
                            <option value="">Select Marital Status</option>
                            <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                            <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Unmarried</option>
                            <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Nationality</label>
                        <select class="form-select" name="nationality" required>
                            <option value="">Select Nationality</option>
                            @foreach($countries as $country)
                                <option value="{{ strtolower($country->country_code) }}" {{ old('nationality') == strtolower($country->country_code) ? 'selected' : '' }}>
                                    {{ $country->country }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Passport Number</label>
                        <input type="text" name="passport_no" class="form-input" placeholder="Enter passport number" value="{{ old('passport_no') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Gender</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-grid two-col">
                    <div class="form-group">
                        <label class="form-label required">Passport Issue Date</label>
                        <input type="date" name="passport_issue_date" class="form-input" value="{{ old('passport_issue_date') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Expiry Date</label>
                        <input type="date" name="passport_expiry_date" class="form-input" value="{{ old('passport_expiry_date') }}" required>
                    </div>
                </div>
            </div>

            <!-- Document Uploads Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-file-upload"></i> Document Uploads
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Passport Front Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="passport_front" id="passport-front" class="file-upload-input" accept="image/*,.pdf" required>
                            <label for="passport-front" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG, PDF (Max 5MB)</div>
                        </div>
                        @error('passport_front')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Back Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="passport_back" id="passport-back" class="file-upload-input" accept="image/*,.pdf" required>
                            <label for="passport-back" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG, PDF (Max 5MB)</div>
                        </div>
                        @error('passport_back')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Size Photo</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="passport_photo" id="passport-photo" class="file-upload-input" accept="image/*" required>
                            <label for="passport-photo" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG (Max 5MB)</div>
                        </div>
                        @error('passport_photo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-grid full">
                    <div class="form-group">
                        <label class="form-label">Upload Additional Document (Optional)</label>
                        <div class="file-upload-wrapper">
                            <input type="file" name="other_document" id="additional-doc" class="file-upload-input" accept=".pdf,.doc,.docx,image/*">
                            <label for="additional-doc" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload (optional)
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG, PDF, DOC (Max 5MB)</div>
                        </div>
                        @error('other_document')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Agreement Section -->
            <div class="form-section">
                <div class="agreement-box">
                    <input type="checkbox" name="agreed_terms" id="agreement" value="on" required>
                    <label for="agreement" class="agreement-text">
                        I/we agree to <strong>terms & conditions</strong>, <strong>visa fee</strong> and <strong>service charges</strong> applicable
                    </label>
                </div>
                @error('agreed_terms')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="form-section">
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Button Group -->
            <div class="button-group">
                <button type="reset" class="btn btn-reset">
                    <i class="fas fa-redo"></i> Clear Form
                </button>
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-check-circle"></i> Submit Application
                </button>
            </div>
        </form>
    </div>

    <style>
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>

    <script>
        // File upload preview
        document.querySelectorAll('.file-upload-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                const label = this.nextElementSibling;
                if (fileName) {
                    label.innerHTML = `<i class="fas fa-check-circle"></i> ${fileName}`;
                    label.style.color = '#28a745';
                }
            });
        });

        // Show loader on visa form submit
        document.querySelector('form[action="{{ route("visa.store") }}"]').addEventListener('submit', function(e) {
            // Show loader
            const loader = document.getElementById('pageLoader');
            if (loader) {
                loader.classList.remove('hidden');
            }
        });
    </script>
@endsection