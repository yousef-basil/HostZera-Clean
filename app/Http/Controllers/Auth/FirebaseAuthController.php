<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FirebaseTokenVerifier;
use App\Services\WhmcsApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FirebaseAuthController extends Controller
{
    /**
     * Handle the login from Firebase ID Token.
     */
    public function login(Request $request, FirebaseTokenVerifier $verifier, WhmcsApiService $whmcsService)
    {
        $request->validate([
            'id_token' => 'required|string',
        ]);

        $payload = $verifier->verify($request->id_token);

        if (!$payload) {
            \Log::error("Firebase login failed: Invalid Token provided.");
            return response()->json([
                'success' => false,
                'message' => 'Invalid Firebase Token',
            ], 401);
        }

        $email = $payload->email;
        $uid = $payload->sub;
        $name = $payload->name ?? 'User';
        $picture = $payload->picture ?? null;

        // Find or create user
        $user = User::where('email', $email)->first();

        $isNewUser = false;

        if (!$user) {
            $isNewUser = true;
            $user = User::create([
                'name'              => $name,
                'email'             => $email,
                'google_id'         => $uid,
                'avatar'            => $picture,
                'email_verified_at' => now(),
            ]);
        } else {
            // Update UID and avatar if necessary
            $user->update([
                'google_id' => $uid,
                'avatar'    => $picture,
            ]);
        }

        // Sync with WHMCS if new user or missing client id
        try {
            if ($isNewUser || empty($user->whmcs_client_id)) {
                $whmcsService->createClient($user);
            }
        } catch (\Exception $e) {
            \Log::warning("WHMCS sync failed during Google login, but allowing user through: " . $e->getMessage());
        }

        // Login the user in the session
        Auth::login($user, true);

        return response()->json([
            'success' => true,
            'user'    => $user,
            'message' => 'Logged in successfully',
        ]);
    }
}
