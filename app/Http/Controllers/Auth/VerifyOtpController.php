<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOtpController extends Controller
{
    /**
     * Handle the verification of the OTP code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['sometimes', 'email'],
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = Auth::user();

        // If not authenticated via session, try finding by email
        if (!$user && $request->has('email')) {
            $user = User::where('email', $request->email)->first();
        }

        if (!$user) {
            \Log::warning('OTP verification attempt without user session or missing email.', ['email' => $request->email]);
            return response()->json([
                'status' => 'error',
                'message' => 'User not found. Please try sign up again.',
            ], 401);
        }

        if ($user->otp_code === $request->otp && now()->lessThan($user->otp_expires_at)) {
            $user->update([
                'email_verified_at' => now(),
                'otp_code' => null,
                'otp_expires_at' => null,
            ]);

            // Auto-login if found by email but not in session
            Auth::login($user);

            \Log::info("OTP verification successful for user {$user->id}");

            if (!$request->wantsJson()) {
                return redirect()->route('dashboard');
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Email verified successfully. Welcome to your dashboard!',
                'user' => $user,
            ]);
        }

        \Log::warning("OTP verification failed for user {$user->id}: Invalid or expired code.");

        if (!$request->wantsJson()) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP code.']);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid or expired OTP code.',
        ], 422);
    }
}
