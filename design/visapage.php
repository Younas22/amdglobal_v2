<?php include 'header.php'; ?>
    <style>

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Form Header */
        .form-header {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.15);
        }

        .form-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-header p {
            font-size: 13px;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* Form Container */
        .form-wrapper {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        /* Section */
        .form-section {
            padding: 30px;
            border-bottom: 1px solid #E5E7EB;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 20px;
            background-color: #0077BE;
            border-radius: 2px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .form-grid.two-col {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-grid.full {
            grid-template-columns: 1fr;
        }

        /* Form Group */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #1F2937;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-label.required::after {
            content: ' *';
            color: #DC2626;
            font-weight: 700;
        }

        .form-input,
        .form-select,
        .form-textarea {
            padding: 12px 14px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 13px;
            font-family: inherit;
            background-color: white;
            transition: all 0.3s ease;
            color: #1F2937;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #D1D5DB;
        }

        .form-input:hover,
        .form-select:hover,
        .form-textarea:hover {
            border-color: #D1D5DB;
            background-color: #FAFBFC;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #0077BE;
            background-color: #F0F9FF;
            box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.15);
        }

        /* Radio & Checkbox */
        .radio-group,
        .checkbox-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .radio-item,
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .radio-item input[type="radio"],
        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .radio-item label,
        .checkbox-item label {
            font-size: 12px;
            color: #6B7280;
            font-weight: 500;
            cursor: pointer;
        }

        /* File Upload */
        .file-upload-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
        }

        .file-upload-input {
            display: none;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 20px;
            border: 2px dashed #0077BE;
            border-radius: 8px;
            background-color: #F0F9FF;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 13px;
            font-weight: 600;
            color: #0077BE;
        }

        .file-upload-label:hover {
            background-color: #E0F2FE;
            border-color: #005A9C;
        }

        .file-upload-input:focus + .file-upload-label {
            background-color: #E0F2FE;
            border-color: #005A9C;
        }

        .file-size-hint {
            font-size: 11px;
            color: #9CA3AF;
        }

        /* Checkbox with Agreement */
        .agreement-box {
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 16px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .agreement-box input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-top: 3px;
            flex-shrink: 0;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .agreement-text {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.6;
        }

        .agreement-text strong {
            color: #1F2937;
            font-weight: 600;
        }

        /* Button Group */
        .button-group {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding: 20px 30px;
            background-color: #F9FAFB;
            border-top: 1px solid #E5E7EB;
        }

        .btn {
            padding: 12px 28px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-reset {
            background-color: #F3F4F6;
            color: #1F2937;
            border: 1px solid #D1D5DB;
        }

        .btn-reset:hover {
            background-color: #E5E7EB;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(0, 119, 190, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        /* Currency Input */
        .currency-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .currency-symbol {
            position: absolute;
            left: 14px;
            font-size: 13px;
            font-weight: 600;
            color: #6B7280;
        }

        .currency-input-group .form-input {
            padding-left: 30px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-grid.two-col {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
                justify-content: stretch;
            }

            .btn {
                justify-content: center;
            }

            .form-header {
                padding: 20px;
            }

            .form-section {
                padding: 20px;
            }

            .form-header h1 {
                font-size: 22px;
            }
        }
    </style>


    <div class="container">
        <!-- Form Header -->
        <div class="form-header">
            <h1>Visa Request Form</h1>
            <p>Please fill out all required fields marked with <strong>*</strong></p>
        </div>

        <!-- Form Wrapper -->
        <form class="form-wrapper" onsubmit="handleSubmit(event)">
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

<?php include 'footer.php';