@extends('layouts.auth')

@section('title', 'Verify OTP - HOSTZERA')
@section('meta_description', 'Verify your email with the OTP code we sent you.')

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

        <form method="POST" action="{{ route('otp') }}">
            @csrf
            <div style="display: flex; gap: 8px; justify-content: center; margin-bottom: 2rem;">
                @for($i = 0; $i < 6; $i++)
                <input
                    type="text"
                    maxlength="1"
                    name="otp[]"
                    class="otp-input"
                    data-index="{{ $i }}"
                    style="width: 45px; height: 55px; text-align: center; font-size: 1.5rem; font-weight: 700; border-radius: 10px; border: 1.5px solid #e5e7eb; outline: none;"
                />
                @endfor
            </div>

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
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.otp-input');
    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
});
</script>
@endpush
