@extends('layouts.auth')

@section('title', 'Sign Up - HOSTZERA')
@section('meta_description', 'Create your Hostzera account and start deploying your vision.')

@section('content')
<div class="login-page">
    <div class="login-container">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="text-decoration: none;">
                <h1 class="logo-text">Host<span>zera</span></h1>
            </a>
        </div>

        <div class="title-section">
            <h1>Join Hostzera</h1>
            <p>Create your account and start deploying your vision.</p>
        </div>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.85rem;">
                <ul style="margin: 0; padding-left: 1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="name@hostzera.com" required />
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required />
            </div>


            <button type="submit" class="login-btn">Create Account</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #6b7280;">
            Already have an account? <a href="{{ route('login') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Log in</a>
        </p>
    </div>

    <div class="visual-side">
        <h2>Start Building Today</h2>
        <p>Simple, scalable, and secure hosting for everyone.</p>
    </div>
</div>
@endsection
