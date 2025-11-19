@extends('common.layout')
@section('content')

    <div class="flight-container">
        <!-- Form Header -->
        <div class="page-header">
            <h1>Visa Request Form</h1>
            <p>Please fill out all required fields marked with <strong>*</strong></p>
        </div>

        <!-- Form Wrapper -->
        <form class="form-wrapper- contact-info" onsubmit="handleSubmit(event)">
            <!-- Passenger Details Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-user"></i> Passenger Details
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">First Name</label>
                        <input type="text" class="form-input" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-input" placeholder="Enter middle name (optional)">
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Surname</label>
                        <input type="text" class="form-input" placeholder="Enter surname" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Father's Name</label>
                        <input type="text" class="form-input" placeholder="Enter father's name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Mother's Name</label>
                        <input type="text" class="form-input" placeholder="Enter mother's name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Place of Birth</label>
                        <input type="text" class="form-input" placeholder="Enter place of birth" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Occupation</label>
                        <input type="text" class="form-input" placeholder="Enter occupation" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Religion</label>
                        <input type="text" class="form-input" placeholder="Enter religion" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Marital Status</label>
                        <select class="form-select" required>
                            <option value="">Select Marital Status</option>
                            <option value="married">Married</option>
                            <option value="unmarried">Unmarried</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Nationality</label>
                        <select class="form-select" required>
                            <option value="">Select Nationality</option>
                            <option value="pk">Pakistan</option>
                            <option value="sa">Saudi Arabia</option>
                            <option value="ae">United Arab Emirates</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="in">India</option>
                            <option value="cn">China</option>
                            <option value="jp">Japan</option>
                            <option value="au">Australia</option>
                            <option value="ca">Canada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Number</label>
                        <input type="text" class="form-input" placeholder="Enter passport number" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Gender</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" id="male" name="gender" value="male" required>
                                <label for="male">Male</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-grid two-col">
                    <div class="form-group">
                        <label class="form-label required">Date of Issue</label>
                        <input type="date" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Date of Expiry</label>
                        <input type="date" class="form-input" required>
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
                            <input type="file" id="passport-front" class="file-upload-input" accept="image/*" required>
                            <label for="passport-front" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG (Max 5MB)</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Back Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="passport-back" class="file-upload-input" accept="image/*" required>
                            <label for="passport-back" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG (Max 5MB)</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Passport Size Image</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="passport-size" class="file-upload-input" accept="image/*" required>
                            <label for="passport-size" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG (Max 5MB)</div>
                        </div>
                    </div>
                </div>

                <div class="form-grid full">
                    <div class="form-group">
                        <label class="form-label">Upload Additional Document</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="additional-doc" class="file-upload-input" accept=".pdf,.doc,.docx,image/*">
                            <label for="additional-doc" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i> Click to upload (optional)
                            </label>
                            <div class="file-size-hint">Supported: JPG, PNG, PDF, DOC (Max 10MB)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Receipt Details Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-receipt"></i> Payment Receipt Details
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Receipt Number</label>
                        <input type="text" class="form-input" placeholder="Enter receipt number" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Amount</label>
                        <div class="currency-input-group">
                            <span class="currency-symbol">$</span>
                            <input type="number" class="form-input" placeholder="0.00" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Date</label>
                        <input type="date" class="form-input" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Visa Payment</label>
                        <div class="currency-input-group">
                            <span class="currency-symbol">$</span>
                            <input type="number" class="form-input" placeholder="0.00" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ticket/OTB</label>
                        <input type="text" class="form-input" placeholder="Enter ticket/OTB number">
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Security Deposit</label>
                        <div class="currency-input-group">
                            <span class="currency-symbol">$</span>
                            <input type="number" class="form-input" placeholder="0.00" step="0.01" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agreement Section -->
            <div class="form-section">
                <div class="agreement-box">
                    <input type="checkbox" id="agreement" required>
                    <label for="agreement" class="agreement-text">
                        I/we agree to <strong>terms & conditions</strong>, <strong>visa fee</strong> and <strong>service charges</strong> applicable
                    </label>
                </div>
            </div>

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

    <script>
        function handleSubmit(event) {
            event.preventDefault();
            alert('Visa application submitted successfully!');
            // Form submission logic here
        }
    </script>
@endsection