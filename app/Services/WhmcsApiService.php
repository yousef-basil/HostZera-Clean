<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class WhmcsApiService
{
    protected string $apiUrl;
    protected string $apiIdentifier;
    protected string $apiSecret;

    public function __construct()
    {
        $this->apiUrl = config('services.whmcs.api_url');
        $this->apiIdentifier = config('services.whmcs.api_identifier');
        $this->apiSecret = config('services.whmcs.api_secret');
    }

    /**
     * Register a user as a client in WHMCS.
     *
     * @param User $user
     * @return string|null The WHMCS client ID, or null on failure.
     */
    public function createClient(User $user): ?string
    {
        try {
            // Split name into first and last
            $nameParts = explode(' ', $user->name, 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? '';

            $response = Http::withoutVerifying()
                ->timeout(5)
                ->asForm()
                ->post($this->apiUrl, [
                    'action' => 'AddClient',
                    'identifier' => $this->apiIdentifier,
                    'secret' => $this->apiSecret,
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'email' => $user->email,
                    'address1' => 'N/A',
                    'city' => 'N/A',
                    'state' => 'N/A',
                    'postcode' => '00000',
                    'country' => 'US',
                    'phonenumber' => '0000000000',
                    'password' => Str::random(16),
                    'responsetype' => 'json',
                ]);

            $data = $response->json();

            if (isset($data['result']) && $data['result'] === 'success') {
                $clientId = (string) $data['clientid'];

                // Save the WHMCS client ID to the user
                $user->update(['whmcs_client_id' => $clientId]);

                Log::info("WHMCS client created for user {$user->id}: clientid={$clientId}");
                return $clientId;
            }

            Log::error('WHMCS AddClient failed', [
                'user_id' => $user->id,
                'response' => $data,
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('WHMCS API error', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    /**
     * Get client details from WHMCS by client ID.
     *
     * @param string $clientId
     * @return array|null
     */
    public function getClientDetails(string $clientId): ?array
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(5)
                ->asForm()
                ->post($this->apiUrl, [
                    'action' => 'GetClientsDetails',
                    'identifier' => $this->apiIdentifier,
                    'secret' => $this->apiSecret,
                    'clientid' => $clientId,
                    'responsetype' => 'json',
                ]);

            $data = $response->json();

            if (isset($data['result']) && $data['result'] === 'success') {
                return $data;
            }

            return null;
        } catch (\Exception $e) {
            Log::error('WHMCS GetClientsDetails error', [
                'client_id' => $clientId,
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }
    /**
     * Get all products from WHMCS.
     *
     * @return array|null
     */
    public function getProducts(): ?array
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(10)
                ->asForm()
                ->post($this->apiUrl, [
                    'action' => 'GetProducts',
                    'identifier' => $this->apiIdentifier,
                    'secret' => $this->apiSecret,
                    'responsetype' => 'json',
                ]);

            $data = $response->json();

            if (isset($data['result']) && $data['result'] === 'success') {
                return $data['products']['product'] ?? [];
            }

            Log::error('WHMCS GetProducts failed', ['response' => $data]);
            return null;
        } catch (\Exception $e) {
            Log::error('WHMCS GetProducts error', ['error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Get services for a specific client.
     *
     * @param string $clientId
     * @return array|null
     */
    public function getClientServices(string $clientId): ?array
    {
        try {
            $response = Http::withoutVerifying()
                ->timeout(10)
                ->asForm()
                ->post($this->apiUrl, [
                    'action' => 'GetClientsServices',
                    'identifier' => $this->apiIdentifier,
                    'secret' => $this->apiSecret,
                    'clientid' => $clientId,
                    'responsetype' => 'json',
                ]);

            $data = $response->json();

            if (isset($data['result']) && $data['result'] === 'success') {
                // Return services array
                return $data['products']['product'] ?? [];
            }

            Log::error('WHMCS GetClientsServices failed', [
                'client_id' => $clientId,
                'response' => $data,
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('WHMCS GetClientsServices error', [
                'client_id' => $clientId,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }
}
