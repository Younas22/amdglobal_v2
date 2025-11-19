@extends('admin.layouts.app')

@section('title', 'Payment Settings')

@section('content')
<div class="content-area p-4">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-1">Payment Settings</h2>
                <p class="text-muted mb-0">Configure payment gateways and processing methods</p>
            </div>
            <div class="col-md-4">
                <div class="text-end">
                    <button class="btn btn-success modern-btn" onclick="saveAllPaymentSettings()">
                        <i class="bi bi-check-lg"></i> Save All Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Methods Container -->
    <div class="payment-methods-container">
        <div class="p-4">
            <h4 class="mb-3">Payment Gateways</h4>
            <p class="text-muted mb-4">Manage and configure your payment processing methods</p>

            <!-- Stripe Payment Method -->
            <div class="payment-method-card">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo logo-paypal"
                            style="background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; width:50px; height:50px; overflow:hidden;">
                            <img src="{{ url('public/assets/images/settings/payment/stripe.png') }}"
                                alt="Stripe"
                                style="width:100%; height:100%; object-fit:contain;">
                        </div>


                        <div class="payment-details">
                            <h5>Stripe</h5>
                            <div class="payment-description">Accept credit cards, digital wallets, and bank transfers</div>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <div class="status-badge {{ !empty($settings['stripe_public_key']) && !empty($settings['stripe_secret_key']) ? 'status-configured' : 'status-pending' }}">
                            {{ !empty($settings['stripe_public_key']) && !empty($settings['stripe_secret_key']) ? 'Configured' : 'Pending Setup' }}
                        </div>
                        <div class="status-toggle">
                            <label>
                                <input type="checkbox"
                                    id="stripeStatus"
                                    {{ ($settings['stripe_enabled'] ?? false) ? 'checked' : '' }}
                                    onchange="togglePaymentMethod('stripe', this.checked)">
                                <span class="status-slider"></span>
                            </label>
                        </div>

                        <button class="config-btn" onclick="toggleConfig('stripe')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- Stripe Configuration Form -->
                <div class="config-form" id="stripeConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo logo-paypal"
                                style="width:40px; height:40px; background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                <img src="{{ url('public/assets/images/settings/payment/stripe.png') }}"
                                    alt="Stripe"
                                    style="width:100%; height:100%; object-fit:contain;">
                            </div>

                            Stripe Payment Configuration
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('stripe')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="stripeForm" onsubmit="savePaymentGateway(event, 'stripe')">
                        <div class="config-section">
                            <div class="section-title">Stripe API Integration</div>
                            <div class="section-description">Enter your Stripe API credentials from your Stripe Dashboard</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Publishable Key</label>
                                        <input type="text" class="form-control credential-input"
                                               name="stripe_public_key"
                                               value="{{ $settings['stripe_public_key'] ?? '' }}"
                                               placeholder="pk_test_xxxxxxxxxx" required>
                                        <div class="form-text">Your Stripe publishable key</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Secret Key</label>
                                        <input type="text" class="form-control credential-input"
                                               name="stripe_secret_key"
                                               value="{{ $settings['stripe_secret_key'] ?? '' }}"
                                               placeholder="sk_test_xxxxxxxxxx" required>
                                        <div class="form-text">Your Stripe secret key</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Webhook Endpoint Secret</label>
                                <input type="text" class="form-control credential-input"
                                       name="stripe_webhook_secret"
                                       value="{{ $settings['stripe_webhook_secret'] ?? '' }}"
                                       placeholder="whsec_xxxxxxxxxx">
                                <div class="form-text">For webhook event verification</div>
                            </div>
                        </div>

                        <div class="dev-mode-section">
                            <div class="section-title">Development Mode</div>
                            <div class="dev-mode-toggle">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                           name="stripe_test_mode" id="stripeDevMode" value="1"
                                           {{ ($settings['stripe_test_mode'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="stripeDevMode">
                                        <strong>Test Mode Enabled</strong>
                                        <div class="small text-muted">Use test API keys for development</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Administrative Notes</label>
                            <textarea class="form-control" rows="3" name="stripe_notes"
                                      placeholder="Internal notes about this payment method configuration">{{ $settings['stripe_notes'] ?? '' }}</textarea>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save Stripe Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- PayPal Payment Method -->
            <div class="payment-method-card">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo logo-paypal"
                            style="width:50px; height:50px; background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                            <img src="{{ url('public/assets/images/settings/payment/paypal.png') }}"
                                alt="PayPal"
                                style="width:100%; height:100%; object-fit:contain;">
                        </div>


                        <div class="payment-details">
                            <h5>PayPal</h5>
                            <div class="payment-description">Accept PayPal, Venmo, and Buy Now Pay Later options</div>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <div class="status-badge {{ !empty($settings['paypal_client_id']) && !empty($settings['paypal_client_secret']) ? 'status-configured' : 'status-pending' }}">
                            {{ !empty($settings['paypal_client_id']) && !empty($settings['paypal_client_secret']) ? 'Configured' : 'Pending Setup' }}
                        </div>
                        <div class="status-toggle">
                             <label>
                            <input type="checkbox" id="paypalStatus"
                                   {{ ($settings['paypal_enabled'] ?? false) ? 'checked' : '' }}
                                   onchange="togglePaymentMethod('paypal', this.checked)">
                            <span class="status-slider"></span>
                             </label>
                        </div>
                        <button class="config-btn" onclick="toggleConfig('paypal')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- PayPal Configuration Form -->
                <div class="config-form" id="paypalConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo logo-paypal"
                                style="width:40px; height:40px; background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                <img src="{{ url('public/assets/images/settings/payment/paypal.png') }}"
                                    alt="PayPal"
                                    style="width:100%; height:100%; object-fit:contain;">
                            </div>


                            PayPal Business Configuration
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('paypal')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="paypalForm" onsubmit="savePaymentGateway(event, 'paypal')">
                        <div class="config-section">
                            <div class="section-title">PayPal Business Account</div>
                            <div class="section-description">Configure your PayPal business account credentials</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Client ID</label>
                                        <input type="text" class="form-control credential-input"
                                               name="paypal_client_id"
                                               value="{{ $settings['paypal_client_id'] ?? '' }}"
                                               placeholder="AxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxQ" required>
                                        <div class="form-text">Your PayPal application client ID</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Client Secret</label>
                                        <input type="text" class="form-control credential-input"
                                               name="paypal_client_secret"
                                               value="{{ $settings['paypal_client_secret'] ?? '' }}"
                                               placeholder="ExxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxQ" required>
                                        <div class="form-text">Your PayPal application client secret</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Webhook ID</label>
                                <input type="text" class="form-control credential-input"
                                       name="paypal_webhook_id"
                                       value="{{ $settings['paypal_webhook_id'] ?? '' }}"
                                       placeholder="1234567890ABCDEF">
                                <div class="form-text">PayPal webhook identifier for notifications</div>
                            </div>
                        </div>

                        <div class="dev-mode-section">
                            <div class="section-title">Environment Mode</div>
                            <div class="dev-mode-toggle">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                           name="paypal_sandbox_mode" id="paypalDevMode" value="1"
                                           {{ ($settings['paypal_sandbox_mode'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="paypalDevMode">
                                        <strong>Sandbox Environment</strong>
                                        <div class="small text-muted">Use PayPal sandbox for testing</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Administrative Notes</label>
                            <textarea class="form-control" rows="3" name="paypal_notes"
                                      placeholder="Internal notes about this payment method configuration">{{ $settings['paypal_notes'] ?? '' }}</textarea>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save PayPal Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Payone Payment Method -->
            <div class="payment-method-card">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo logo-paypal"
                            style="width:50px; height:50px; background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                            <img src="{{ url('public/assets/images/settings/payment/payone.jpeg') }}"
                                alt="Payone"
                                style="width:100%; height:100%; object-fit:contain;">
                        </div>

                        <div class="payment-details">
                            <h5>Payone</h5>
                            <div class="payment-description">Accept 3D secure credit cards</div>
                        </div>

                    </div>
                    <div class="payment-actions">
                        <div class="status-badge {{ !empty($settings['payone_merchant_id']) && !empty($settings['payone_portal_id']) ? 'status-configured' : 'status-pending' }}">
                            {{ !empty($settings['payone_merchant_id']) && !empty($settings['payone_portal_id']) ? 'Configured' : 'Pending Setup' }}
                        </div>
                        <div class="status-toggle">
                            <label>
                                <input type="checkbox" id="payoneStatus"
                                       {{ ($settings['payone_enabled'] ?? false) ? 'checked' : '' }}
                                       onchange="togglePaymentMethod('payone', this.checked)">
                                <span class="status-slider"></span>
                            </label>
                        </div>
                        <button class="config-btn" onclick="toggleConfig('payone')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- Payone Configuration Form -->
                <div class="config-form" id="payoneConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo logo-paypal"
                                style="width:40px; height:40px; background:#fff; border-radius:25px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                <img src="{{ url('public/assets/images/settings/payment/payone.jpeg') }}"
                                    alt="Payone"
                                    style="width:100%; height:100%; object-fit:contain;">
                            </div>

                            Payone Payment Configuration
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('payone')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="payoneForm" onsubmit="savePaymentGateway(event, 'payone')">
                        <div class="config-section">
                            <div class="section-title">Payone Merchant Credentials</div>
                            <div class="section-description">Enter your Payone merchant account credentials</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Merchant ID</label>
                                        <input type="text" class="form-control credential-input"
                                               name="payone_merchant_id"
                                               value="{{ $settings['payone_merchant_id'] ?? '' }}"
                                               placeholder="Your Merchant ID" required>
                                        <div class="form-text">Your Payone merchant ID</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Portal ID</label>
                                        <input type="text" class="form-control credential-input"
                                               name="payone_portal_id"
                                               value="{{ $settings['payone_portal_id'] ?? '' }}"
                                               placeholder="Your Portal ID" required>
                                        <div class="form-text">Your Payone portal ID</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">API Key</label>
                                        <input type="text" class="form-control credential-input"
                                               name="payone_api_key"
                                               value="{{ $settings['payone_api_key'] ?? '' }}"
                                               placeholder="Your API Key" required>
                                        <div class="form-text">Your Payone API key</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">API Password</label>
                                        <input type="password" class="form-control credential-input"
                                               name="payone_api_password"
                                               value="{{ $settings['payone_api_password'] ?? '' }}"
                                               placeholder="Your API Password" required>
                                        <div class="form-text">Your Payone API password</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Webhook Secret</label>
                                <input type="text" class="form-control credential-input"
                                       name="payone_webhook_secret"
                                       value="{{ $settings['payone_webhook_secret'] ?? '' }}"
                                       placeholder="Your Webhook Secret">
                                <div class="form-text">Secret for webhook signature verification</div>
                            </div>
                        </div>

                        <div class="dev-mode-section">
                            <div class="section-title">Environment Mode</div>
                            <div class="dev-mode-toggle">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                           name="payone_test_mode" id="payoneDevMode" value="1"
                                           {{ ($settings['payone_test_mode'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="payoneDevMode">
                                        <strong>Test Mode Enabled</strong>
                                        <div class="small text-muted">Use test credentials for development</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Administrative Notes</label>
                            <textarea class="form-control" rows="3" name="payone_notes"
                                      placeholder="Internal notes about this payment method configuration">{{ $settings['payone_notes'] ?? '' }}</textarea>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save Payone Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Razorpay Payment Method -->
            <div class="payment-method-card d-none">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo logo-razorpay">
                            RP
                        </div>
                        <div class="payment-details">
                            <h5>Razorpay</h5>
                            <div class="payment-description">Accept payments across India with UPI, cards, and wallets</div>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <div class="status-badge {{ !empty($settings['razorpay_key_id']) && !empty($settings['razorpay_key_secret']) ? 'status-configured' : 'status-pending' }}">
                            {{ !empty($settings['razorpay_key_id']) && !empty($settings['razorpay_key_secret']) ? 'Configured' : 'Pending Setup' }}
                        </div>
                        <div class="status-toggle">
                            <label>
                            <input type="checkbox" id="razorpayStatus"
                                   {{ ($settings['razorpay_enabled'] ?? false) ? 'checked' : '' }}
                                   onchange="togglePaymentMethod('razorpay', this.checked)">
                            <span class="status-slider"></span>
                            </label>
                        </div>
                        <button class="config-btn" onclick="toggleConfig('razorpay')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- Razorpay Configuration Form -->
                <div class="config-form" id="razorpayConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo logo-razorpay" style="width: 40px; height: 40px; font-size: 1rem;">
                                RP
                            </div>
                            Razorpay Gateway Setup
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('razorpay')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="razorpayForm" onsubmit="savePaymentGateway(event, 'razorpay')">
                        <div class="config-section">
                            <div class="section-title">Razorpay API Credentials</div>
                            <div class="section-description">Get your API credentials from Razorpay Dashboard</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Key ID</label>
                                        <input type="text" class="form-control credential-input"
                                               name="razorpay_key_id"
                                               value="{{ $settings['razorpay_key_id'] ?? '' }}"
                                               placeholder="rzp_test_xxxxxxxxxx" required>
                                        <div class="form-text">Your Razorpay key ID</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Key Secret</label>
                                        <input type="text" class="form-control credential-input"
                                               name="razorpay_key_secret"
                                               value="{{ $settings['razorpay_key_secret'] ?? '' }}"
                                               placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxx" required>
                                        <div class="form-text">Your Razorpay key secret</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Webhook Secret</label>
                                <input type="text" class="form-control credential-input"
                                       name="razorpay_webhook_secret"
                                       value="{{ $settings['razorpay_webhook_secret'] ?? '' }}"
                                       placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxx">
                                <div class="form-text">Secret for webhook signature verification</div>
                            </div>
                        </div>

                        <div class="dev-mode-section">
                            <div class="section-title">Testing Environment</div>
                            <div class="dev-mode-toggle">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                           name="razorpay_test_mode" id="razorpayDevMode" value="1"
                                           {{ ($settings['razorpay_test_mode'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="razorpayDevMode">
                                        <strong>Test Mode Active</strong>
                                        <div class="small text-muted">Use test keys for development</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Administrative Notes</label>
                            <textarea class="form-control" rows="3" name="razorpay_notes"
                                      placeholder="Internal notes about this payment method configuration">{{ $settings['razorpay_notes'] ?? '' }}</textarea>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save Razorpay Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Square Payment Method -->
            <div class="payment-method-card d-none">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo logo-square">
                            <i class="bi bi-square"></i>
                        </div>
                        <div class="payment-details">
                            <h5>Square</h5>
                            <div class="payment-description">Comprehensive payment processing with point-of-sale integration</div>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <div class="status-badge {{ !empty($settings['square_application_id']) && !empty($settings['square_access_token']) ? 'status-configured' : 'status-pending' }}">
                            {{ !empty($settings['square_application_id']) && !empty($settings['square_access_token']) ? 'Configured' : 'Pending Setup' }}
                        </div>
                        <div class="status-toggle">
                            <label>
                            <input type="checkbox" id="squareStatus"
                                   {{ ($settings['square_enabled'] ?? false) ? 'checked' : '' }}
                                   onchange="togglePaymentMethod('square', this.checked)">
                            <span class="status-slider"></span>
                            </label>
                        </div>
                        <button class="config-btn" onclick="toggleConfig('square')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- Square Configuration Form -->
                <div class="config-form" id="squareConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo logo-square" style="width: 40px; height: 40px; font-size: 1rem;">
                                <i class="bi bi-square"></i>
                            </div>
                            Square Payment Integration
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('square')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="squareForm" onsubmit="savePaymentGateway(event, 'square')">
                        <div class="config-section">
                            <div class="section-title">Square Application Setup</div>
                            <div class="section-description">Configure your Square application credentials</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Application ID</label>
                                        <input type="text" class="form-control credential-input"
                                               name="square_application_id"
                                               value="{{ $settings['square_application_id'] ?? '' }}"
                                               placeholder="sq0idp-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" required>
                                        <div class="form-text">Your Square application ID</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label required-field">Access Token</label>
                                        <input type="text" class="form-control credential-input"
                                               name="square_access_token"
                                               value="{{ $settings['square_access_token'] ?? '' }}"
                                               placeholder="sq0atp-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" required>
                                        <div class="form-text">Your Square access token</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Location ID</label>
                                <input type="text" class="form-control credential-input"
                                       name="square_location_id"
                                       value="{{ $settings['square_location_id'] ?? '' }}"
                                       placeholder="LXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX">
                                <div class="form-text">Your Square business location ID</div>
                            </div>
                        </div>

                        <div class="dev-mode-section">
                            <div class="section-title">Development Environment</div>
                            <div class="dev-mode-toggle">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                           name="square_sandbox_mode" id="squareDevMode" value="1"
                                           {{ ($settings['square_sandbox_mode'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="squareDevMode">
                                        <strong>Sandbox Mode</strong>
                                        <div class="small text-muted">Use Square sandbox environment</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Administrative Notes</label>
                            <textarea class="form-control" rows="3" name="square_notes"
                                      placeholder="Internal notes about this payment method configuration">{{ $settings['square_notes'] ?? '' }}</textarea>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save Square Configuration
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- General Payment Settings -->
            <div class="payment-method-card d-none">
                <div class="payment-header">
                    <div class="payment-info">
                        <div class="payment-logo" style="background: #6c757d;">
                            <i class="bi bi-gear"></i>
                        </div>
                        <div class="payment-details">
                            <h5>General Settings</h5>
                            <div class="payment-description">Configure general payment processing settings</div>
                        </div>
                    </div>
                    <div class="payment-actions">
                        <button class="config-btn" onclick="toggleConfig('general')">
                            <i class="bi bi-gear"></i>
                            Configure
                        </button>
                    </div>
                </div>

                <!-- General Configuration Form -->
                <div class="config-form" id="generalConfig" style="display: none;">
                    <div class="config-header">
                        <div class="config-title">
                            <div class="payment-logo" style="width: 40px; height: 40px; font-size: 1rem; background: #6c757d;">
                                <i class="bi bi-gear"></i>
                            </div>
                            General Payment Settings
                        </div>
                        <button class="btn btn-outline-secondary btn-sm" onclick="toggleConfig('general')">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form id="generalForm" onsubmit="savePaymentGateway(event, 'general')">
                        <div class="config-section">
                            <div class="section-title">Currency & Processing</div>
                            <div class="section-description">Configure global payment processing settings</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Default Currency</label>
                                        <select class="form-control" name="payment_currency">
                                            <option value="USD" {{ ($settings['payment_currency'] ?? 'USD') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                            <option value="EUR" {{ ($settings['payment_currency'] ?? '') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                            <option value="GBP" {{ ($settings['payment_currency'] ?? '') == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                                            <option value="INR" {{ ($settings['payment_currency'] ?? '') == 'INR' ? 'selected' : '' }}>INR - Indian Rupee</option>
                                            <option value="CAD" {{ ($settings['payment_currency'] ?? '') == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                        </select>
                                        <div class="form-text">Default currency for all transactions</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Payment Mode</label>
                                        <select class="form-control" name="payment_mode">
                                            <option value="sandbox" {{ ($settings['payment_mode'] ?? 'sandbox') == 'sandbox' ? 'selected' : '' }}>Sandbox/Test Mode</option>
                                            <option value="live" {{ ($settings['payment_mode'] ?? '') == 'live' ? 'selected' : '' }}>Live/Production Mode</option>
                                        </select>
                                        <div class="form-text">Global payment processing mode</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Transaction Fee (%)</label>
                                        <input type="number" class="form-control"
                                               name="transaction_fee_percentage"
                                               value="{{ $settings['transaction_fee_percentage'] ?? '0' }}"
                                               min="0" max="10" step="0.01">
                                        <div class="form-text">Additional fee percentage per transaction</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Fixed Transaction Fee</label>
                                        <input type="number" class="form-control"
                                               name="transaction_fee_fixed"
                                               value="{{ $settings['transaction_fee_fixed'] ?? '0' }}"
                                               min="0" step="0.01">
                                        <div class="form-text">Fixed fee amount per transaction</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="save-section">
                            <button type="submit" class="btn btn-primary modern-btn">
                                <i class="bi bi-check-lg"></i> Save General Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Toggle configuration forms
function toggleConfig(gateway) {
    const configForm = document.getElementById(gateway + 'Config');
    if (configForm.style.display === 'none' || configForm.style.display === '') {
        configForm.style.display = 'block';
    } else {
        configForm.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    window.togglePaymentMethod = function (gateway, enabled) {
        const data = {};
        data[gateway + '_enabled'] = enabled ? '1' : '0';

        fetch('{{ route("admin.settings.payment.update") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                gateway: gateway,
                settings: data
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(`${gateway} ${enabled ? 'enabled' : 'disabled'} successfully!`, 'success');
            } else {
                showNotification('Error updating payment method status', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error updating payment method status', 'error');
        });
    }
});

// Save individual payment gateway
function savePaymentGateway(event, gateway) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    // Convert FormData to JSON
    const settings = {};
    for (let [key, value] of formData.entries()) {
        settings[key] = value;
    }

    fetch('{{ route("admin.settings.payment.update") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            gateway: gateway,
            settings: settings
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(`${gateway} settings saved successfully!`, 'success');
            // Hide config form after successful save
            toggleConfig(gateway);
            // Update status badge if credentials are provided
            updateStatusBadge(gateway, settings);
        } else {
            showNotification('Error saving settings: ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('An error occurred while saving settings', 'error');
    });
}

// Save all payment settings
function saveAllPaymentSettings() {
    const forms = ['stripeForm', 'paypalForm', 'payoneForm', 'razorpayForm', 'squareForm', 'generalForm'];
    let savedForms = 0;
    let hasErrors = false;

    forms.forEach(formId => {
        const form = document.getElementById(formId);
        if (form) {
            const formData = new FormData(form);
            const gateway = formId.replace('Form', '');

            const settings = {};
            for (let [key, value] of formData.entries()) {
                settings[key] = value;
            }

            fetch('{{ route("admin.settings.payment.update") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    gateway: gateway,
                    settings: settings
                })
            })
            .then(response => response.json())
            .then(data => {
                savedForms++;
                if (!data.success) {
                    hasErrors = true;
                }

                if (savedForms === forms.length) {
                    if (hasErrors) {
                        showNotification('Some payment settings could not be saved', 'warning');
                    } else {
                        showNotification('All payment settings saved successfully!', 'success');
                    }
                }
            })
            .catch(error => {
                savedForms++;
                hasErrors = true;
                console.error('Error:', error);

                if (savedForms === forms.length) {
                    showNotification('Error occurred while saving payment settings', 'error');
                }
            });
        }
    });
}

// Update status badge based on credentials
function updateStatusBadge(gateway, settings) {
    // This would update the status badge based on whether required credentials are provided
    // Implementation depends on your specific requirements
}

// Show notification
function showNotification(message, type = 'success') {
    // You can customize this based on your notification system
    alert(message);
}
</script>

@endsection
