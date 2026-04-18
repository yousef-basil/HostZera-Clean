@extends('layouts.auth')

@section('title', 'Login - HOSTZERA')

@push('styles')
<style>
    .login-container {
        padding: 40px !important;
    }
    .social-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 25px;
    }
    .social-btn-premium {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 700;
        color: #1e1b4b;
        font-size: 0.9rem;
    }
    .social-btn-premium:hover {
        background: #fdfbff;
        border-color: #8b5cf6;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1);
    }
    .divider-premium {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 25px 0;
        color: #94a3b8;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.05em;
    }
    .divider-premium::before, .divider-premium::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e2e8f0;
    }
    .divider-premium:not(:empty)::before { margin-right: 1.5rem; }
    .divider-premium:not(:empty)::after { margin-left: 1.5rem; }

    .form-group label {
        font-weight: 700;
        color: #1e1b4b;
        margin-bottom: 8px;
        display: block;
    }
    .input-premium {
        width: 100%;
        padding: 14px 18px !important;
        border-radius: 14px !important;
        border: 1.5px solid #ede9fe !important;
        background: #fdfbff !important;
        transition: all 0.3s ease !important;
    }
    .input-premium:focus {
        border-color: #8b5cf6 !important;
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1) !important;
        outline: none;
    }
    .login-btn-premium {
        width: 100%;
        background: #8b5cf6 !important;
        color: white !important;
        padding: 16px !important;
        border: none !important;
        border-radius: 14px !important;
        font-weight: 800 !important;
        font-size: 1rem !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        margin-top: 10px;
    }
    .login-btn-premium:hover {
        background: #7c3aed !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(124, 58, 237, 0.3);
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

        <div class="title-section" style="margin-bottom: 30px;">
            <h1 style="font-size: 2rem; font-weight: 900; color: #1e1b4b;">Welcome Back</h1>
            <p style="color: #6366f1;">Login to manage your premium hosting services.</p>
        </div>

        <div class="social-grid">
            <button class="social-btn-premium">
                <svg width="20" height="20" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                </svg>
                Google
            </button>
            <button class="social-btn-premium">
                <i data-lucide="mail" style="width:20px; color:#8b5cf6;"></i>
                Email
            </button>
        </div>

        <div class="divider-premium">OR LOG IN WITH EMAIL</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="input-premium" placeholder="name@hostzera.com" value="{{ old('email') }}" required />
                @error('email')
                    <div style="background: #fef2f2; border: 1px solid #fee2e2; padding: 12px; border-radius: 10px; margin-top: 10px;">
                        <span style="color:#ef4444;font-size:0.85rem;font-weight:600;">
                            {{ $message }} 
                            @if(str_contains($message, 'register'))
                                <a href="{{ route('register') }}" style="color:#8b5cf6; text-decoration: underline;">Create account</a>
                            @endif
                        </span>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <label for="password" style="margin-bottom:0;">Password</label>
                    <a href="{{ route('password.request') }}" style="font-size: 0.8rem; color: #8b5cf6; text-decoration: none; font-weight: 700;">Forgot password?</a>
                </div>
                <input type="password" id="password" name="password" class="input-premium" placeholder="••••••••" required />
            </div>
            <button type="submit" class="login-btn-premium">Log In</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.9rem; color: #64748b;">
            New to Hostzera? <a href="{{ route('register') }}" style="color: #8b5cf6; font-weight: 800; text-decoration: none;">Create an account</a>
        </p>
    </div>

    <div class="visual-side" style="background: linear-gradient(135deg, #8b5cf6 0%, #4c1d95 100%); flex: 1.2;">
        <h2>Power Your Vision</h2>
        <p>Premium hosting for high-performance projects. Your journey continues here.</p>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endpush
