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
            'otp' => ['required', 'string', 'min:5', 'max:6'],
        ]);

        $user = Auth::user();

        // If not authenticated via session, try finding by email
        if (!$user && $request->has('email')) {
            $user = User::where('email', $request->email)->first();
        }

        if (!$user) {
            return $request->wantsJson() 
                ? response()->json(['status' => 'error', 'message' => 'User not found.'], 401)
                : back()->withErrors(['email' => 'User session expired.']);
        }

        // Check for specific dummy code '11111' or actual DB code
        $isValidOtp = ($request->otp === '11111' || $request->otp === '111111' || $user->otp_code === $request->otp);

        if ($isValidOtp) {
            // STEP: Check for WHMCS connection
            if (empty($user->whmcs_client_id)) {
                return $request->wantsJson()
                    ? response()->json(['status' => 'error', 'message' => 'لم يتم انشاء حسابك في WHMCS'], 422)
                    : back()->withInput()->withErrors(['otp' => 'لم يتم انشاء حسابك، يرجى التواصل مع الادارة لربط WHMCS']);
            }

            $user->update([
                'email_verified_at' => now(),
                'otp_code' => null,
                'otp_expires_at' => null,
            ]);

            Auth::login($user);

            return $request->wantsJson()
                ? response()->json(['status' => 'success', 'message' => 'Verified.', 'user' => $user])
                : redirect()->route('dashboard');
        }

        return $request->wantsJson()
            ? response()->json(['status' => 'error', 'message' => 'Invalid OTP code.'], 422)
            : back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
    }
}
