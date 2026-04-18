@extends('layouts.auth')

@section('title', 'Login - HOSTZERA')
@section('meta_description', 'Login to your Hostzera dashboard to manage your servers.')

@section('content')
<div class="login-page">
    <div class="login-container">
        <div class="logo-section">
            <a href="{{ route('home') }}" style="text-decoration: none;">
                <h1 class="logo-text">Host<span>zera</span></h1>
            </a>
        </div>

        <div class="title-section">
            <h1>Welcome Back</h1>
            <p>Login to your Hostzera dashboard to manage your servers.</p>
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

        <div class="social-section">
            <button type="button" id="google-signin-btn" class="social-btn">
                <svg width="20" height="20" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                </svg>
                Continue with Google
            </button>
        </div>

        <div class="divider">
            <span>OR LOG IN WITH EMAIL</span>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="name@hostzera.com" required autofocus />
            </div>
            <div class="form-group">
                <div style="display: flex; justify-content: space-between;">
                    <label>Password</label>
                    <a href="{{ route('password.request') }}" style="font-size: 0.8rem; color: #2563eb; text-decoration: none; font-weight: 600;">Forgot password?</a>
                </div>
                <div style="position: relative;">
                    <input type="password" name="password" placeholder="••••••••" id="loginPassword" required />
                    <button type="button" onclick="togglePassword('loginPassword', this)" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #2563eb; font-weight: 600; font-size: 0.8rem;">Show</button>
                </div>
            </div>

            <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" name="remember" id="remember_me" style="width: 16px; height: 16px;">
                <label for="remember_me" style="font-size: 0.85rem; color: #4b5563; cursor: pointer;">Remember me</label>
            </div>

            <button type="submit" class="login-btn">Log In</button>
        </form>

        <p style="text-align: center; margin-top: 2rem; font-size: 0.85rem; color: #6b7280;">
            New to Hostzera? <a href="{{ route('register') }}" style="color: #2563eb; font-weight: 700; text-decoration: none;">Create an account</a>
        </p>
    </div>

    <div class="visual-side">
        <h2>Power Your Vision</h2>
        <p>Premium hosting for high-performance projects. Your journey starts here.</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = 'Hide';
    } else {
        input.type = 'password';
        btn.textContent = 'Show';
}
</script>

<script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
  import { getAuth, signInWithPopup, GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";

  const firebaseConfig = {
    apiKey: "AIzaSyBOa1Hh40dI0OujTDWPV5aHCqav9GwPmZs",
    authDomain: "hosting-44cb1.firebaseapp.com",
    projectId: "hosting-44cb1",
    storageBucket: "hosting-44cb1.firebasestorage.app",
    messagingSenderId: "809345555722",
    appId: "1:809345555722:web:bb6600ab04078e1c0aeef3"
  };

  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  const provider = new GoogleAuthProvider();

  document.getElementById('google-signin-btn').addEventListener('click', () => {
      const btn = document.getElementById('google-signin-btn');
      const originalText = btn.innerHTML;
      btn.innerHTML = 'Connecting...';
      btn.style.opacity = '0.7';
      btn.style.cursor = 'wait';

      signInWithPopup(auth, provider)
          .then((result) => {
              return result.user.getIdToken();
          })
          .then((idToken) => {
              return fetch('/api/auth/firebase/login', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                  },
                  body: JSON.stringify({ id_token: idToken })
              });
          })
          .then(res => res.json())
          .then(data => {
              if (data.success) {
                  window.location.href = "{{ route('dashboard') }}";
              } else {
                  alert("Login failed: " + (data.message || 'Unknown error'));
                  btn.innerHTML = originalText;
                  btn.style.opacity = '1';
                  btn.style.cursor = 'pointer';
              }
          })
          .catch((error) => {
              console.error("Firebase Error:", error);
              if (error.code !== 'auth/popup-closed-by-user') {
                  alert("Authentication failed: " + error.message);
              }
              btn.innerHTML = originalText;
              btn.style.opacity = '1';
              btn.style.cursor = 'pointer';
          });
  });
</script>
@endpush
