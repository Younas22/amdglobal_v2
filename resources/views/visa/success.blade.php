@extends('common.layout')

@section('content')
<style>
@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0, -30px, 0);
    }
    70% {
        transform: translate3d(0, -15px, 0);
    }
    90% {
        transform: translate3d(0, -4px, 0);
    }
}

.success-check {
    animation: bounce 0.6s ease-out;
}


.success-animation {
    position: relative;
    margin: 0 auto 30px;
}

.success-circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #28a745, #20c997);
    position: relative;
    animation: scaleIn 0.5s ease-out;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
}

.success-tick {
    width: 35px;
    height: 20px;
    border-left: 4px solid white;
    border-bottom: 4px solid white;
    transform: rotate(-45deg);
    animation: drawTick 0.5s ease-out 0.2s both;
}

@keyframes scaleIn {
    0% { transform: scale(0); }
    100% { transform: scale(1); }
}

@keyframes drawTick {
    0% { width: 0; height: 0; }
    50% { width: 35px; height: 0; }
    100% { width: 35px; height: 20px; }
}
</style>

<div class="container py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="text-center">
        <!-- Success Animation -->
        <div class="success-animation mb-4">
            <div class="success-circle">
                <div class="success-tick"></div>
            </div>
        </div>
        
        <div class="card shadow-lg rounded-4 border-success" style="max-width: 600px; width: 100%;">
            <div class="card-body p-5">
                <h1 class="text-success mb-3" style="font-size: 2.5rem; font-weight: 700;">
                    Application Submitted!
                </h1>
                <p class="fs-5 mb-4 text-muted">
                    Thank you for choosing SkyBooking! Your visa application has been received and is being processed.
                </p>
                
                <div class="row text-center mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <i class="fas fa-clock text-primary fs-2 mb-2"></i>
                            <h6 class="mb-0">Processing Time</h6>
                            <small class="text-muted">2-3 Business Days</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <i class="fas fa-envelope text-info fs-2 mb-2"></i>
                            <h6 class="mb-0">Email Updates</h6>
                            <small class="text-muted">You'll receive updates</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <i class="fas fa-phone text-warning fs-2 mb-2"></i>
                            <h6 class="mb-0">Phone Support</h6>
                            <small class="text-muted">We'll contact you</small>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/') }}" class="btn btn-primary px-4">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                    <a href="{{ route('visa.create') }}" class="btn btn-outline-primary px-4">
                        <i class="fas fa-plus me-2"></i>New Application
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection