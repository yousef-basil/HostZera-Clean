@extends('layouts.auth')

@section('title', 'Reset Password - HOSTZERA')
@section('meta_description', 'Reset your Hostzera account password.')

@section('content')
<div class="login-page">
    <div class="login-container">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="text-decoration: none;">
                <h1 class="logo-text">Host<span>zera</span></h1>
            </a>
        </div>

        <div class="title-section">
            <h1>Reset Password</h1>
            <p>Don't worry! Enter your email and we'll send you a recovery link.</p>
        </div>

        <form method="POST" action="{{ route('forgot-password') }}">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@hostzera.com" required />
            </div>
            <button type="submit" class="login-btn">Send Reset Link</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #6b7280;">
            Back to <a href="{{ route('login') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Log in</a>
        </p>
    </div>

    <div class="visual-side">
        <h2>Restore Access</h2>
        <p>Recover your credentials quickly and securely. Your servers are waiting.</p>
    </div>
</div>
@endsection
