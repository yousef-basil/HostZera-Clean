@extends('layouts.auth')

@section('title', 'Verify Email - HOSTZERA')

@section('content')
<div class="login-page">
    <div class="login-container">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="text-decoration: none;">
                <h1 class="logo-text">Host<span>zera</span></h1>
            </a>
        </div>

        <div class="title-section">
            <h1>Verify Your Email</h1>
            <p>We've sent a code to your email. Enter it below to confirm your account.</p>
        </div>

        <form method="POST" action="{{ route('otp.verify') }}" id="otpForm">
            @csrf
            <div style="display: flex; gap: 8px; justify-content: center; margin-bottom: 2rem;">
                <input type="text" maxlength="1" class="otp-input" data-index="0"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
                <input type="text" maxlength="1" class="otp-input" data-index="1"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
                <input type="text" maxlength="1" class="otp-input" data-index="2"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
                <input type="text" maxlength="1" class="otp-input" data-index="3"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
                <input type="text" maxlength="1" class="otp-input" data-index="4"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
                <input type="text" maxlength="1" class="otp-input" data-index="5"
                       style="width:45px;height:55px;text-align:center;font-size:1.5rem;font-weight:700;border-radius:10px;border:1.5px solid #e5e7eb;outline:none;" />
            </div>
            {{-- Hidden input to collect full OTP --}}
            <input type="hidden" name="otp" id="otpHidden" />

            @error('otp')
                <span style="color:#ef4444;font-size:0.8rem;display:block;text-align:center;margin-bottom:1rem;">{{ $message }}</span>
            @enderror

            <button type="submit" class="login-btn">Confirm OTP</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #6b7280;">
            Didn't receive the code? <a href="#" style="color: #2563eb; font-weight: 700; text-decoration: none;">Resend</a>
        </p>
    </div>

    <div class="visual-side">
        <h2>Security First</h2>
        <p>Keep your account safe with 2FA and secure verification.</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function () {
            if (this.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });

    document.getElementById('otpForm').addEventListener('submit', function () {
        let otp = '';
        otpInputs.forEach(input => { otp += input.value; });
        document.getElementById('otpHidden').value = otp;
    });
</script>
@endpush
