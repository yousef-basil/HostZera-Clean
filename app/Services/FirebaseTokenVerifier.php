<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class FirebaseTokenVerifier
{
    /**
     * Firebase Google Public Keys URL.
     */
    protected const PUBLIC_KEYS_URL = 'https://www.googleapis.com/robot/v1/metadata/x509/securetoken@system.gserviceaccount.com';

    protected string $projectId;

    public function __construct()
    {
        $this->projectId = config('services.firebase.project_id');
    }

    /**
     * Verify the Firebase ID Token.
     *
     * @param string $token
     * @return object|null Decoded payload on success, null on failure.
     */
    public function verify(string $token)
    {
        try {
            $publicKeys = $this->getPublicKeys();
            
            // Format keys for Firebase/JWT library
            $keys = array_map(function ($cert) {
                return new Key($cert, 'RS256');
            }, $publicKeys);

            \Log::info('Firebase Token decoding...', ['project_id' => $this->projectId]);
            $decoded = JWT::decode($token, $keys);

            // Validate Standard Claims
            if ($decoded->iss !== "https://securetoken.google.com/{$this->projectId}") {
                \Log::error('Firebase Token ISS mismatch', ['expected' => "https://securetoken.google.com/{$this->projectId}", 'actual' => $decoded->iss]);
                return null;
            }

            if ($decoded->aud !== $this->projectId) {
                \Log::error('Firebase Token AUD mismatch', ['expected' => $this->projectId, 'actual' => $decoded->aud]);
                return null;
            }

            return $decoded;
        } catch (\Exception $e) {
            \Log::error('Firebase Token Verification failed', [
                'error' => $e->getMessage(),
                'project_id' => $this->projectId
            ]);
            return null;
        }
    }

    /**
     * Fetch Google Public Keys and cache them for 24 hours.
     */
    protected function getPublicKeys(): array
    {
        return Cache::remember('firebase_public_keys', 86400, function () {
            $response = Http::get(self::PUBLIC_KEYS_URL);
            return $response->json();
        });
    }
}
