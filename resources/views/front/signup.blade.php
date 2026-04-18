@extends('layouts.auth')

@section('title', 'Sign Up - HOSTZERA')

@push('styles')
    <style>
        .input-with-icon {
            position: relative;
            margin-bottom: 20px;
        }

        .input-with-icon i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b5cf6;
            width: 18px;
            height: 18px;
            opacity: 0.7;
        }

        .input-with-icon input {
            padding-left: 45px !important;
            border-radius: 12px !important;
            border: 1px solid #e5e7eb !important;
            transition: all 0.3s ease !important;
        }

        .input-with-icon input:focus {
            border-color: #8b5cf6 !important;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1) !important;
        }

        .login-btn {
            background: #8b5cf6 !important;
            border-radius: 12px !important;
            font-weight: 800 !important;
            height: 54px !important;
        }

        .login-btn:hover {
            background: #7c3aed !important;
            transform: translateY(-2px);
        }
    </style>
@endpush

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

            <div class="social-section">
                <button class="social-btn" style="border-radius: 12px; font-weight: 700;">
                    <svg width="20" height="20" viewBox="0 0 48 48">
                        <path fill="#FFC107"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2"
                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                    </svg>
                    Sign up with Google
                </button>
            </div>

            <div class="divider">
                <span>OR SIGN UP WITH EMAIL</span>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i data-lucide="mail"></i>
                        <input type="email" id="email" name="email" placeholder="name@hostzera.com"
                            value="{{ old('email') }}" required />
                    </div>
                    @error('email')
                        <span style="color:#ef4444;font-size:0.8rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i data-lucide="lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required />
                    </div>
                    @error('password')
                        <span style="color:#ef4444;font-size:0.8rem;">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="login-btn">Create Account</button>
            </form>

            <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #6b7280;">
                Already have an account? <a href="{{ route('login') }}"
                    style="color: #8b5cf6; font-weight: 800; text-decoration: none;">Log in</a>
            </p>
        </div>

        <div class="visual-side" style="background: linear-gradient(135deg, #8b5cf6 0%, #4c1d95 100%);">
            <h2>Start Building Today</h2>
            <p>Simple, scalable, and secure hosting for everyone.</p>
        </div>
    </div>
@endsection