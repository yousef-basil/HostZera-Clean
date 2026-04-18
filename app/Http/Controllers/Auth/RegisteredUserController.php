<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\WhmcsApiService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, WhmcsApiService $whmcsService): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name ?? explode('@', $request->email)[0],
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Generate and send OTP
        $otp = '111111';
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        try {
            $user->notify(new \App\Notifications\OtpNotification($otp));
            \Illuminate\Support\Facades\Log::info("OTP sent to user {$user->id}: {$otp}");
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Failed to send OTP to user {$user->id}: " . $e->getMessage());
        }

        // Register the user in WHMCS (Non-blocking attempt)
        $whmcsClientId = null;
        try {
            $whmcsClientId = $whmcsService->createClient($user);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("WHMCS auto-registration failed: " . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('otp');
    }
}

