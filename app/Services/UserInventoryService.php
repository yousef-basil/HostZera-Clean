<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserService;
use App\Services\WhmcsApiService;
use Illuminate\Support\Facades\Log;

class UserInventoryService
{
    protected $whmcs;

    public function __construct(WhmcsApiService $whmcs)
    {
        $this->whmcs = $whmcs;
    }

    /**
     * Get user services from WHMCS.
     */
    public function getUserServicesFromWhmcs(User $user)
    {
        if (!$user->whmcs_client_id) {
            return [];
        }

        return $this->whmcs->getClientServices($user->whmcs_client_id) ?? [];
    }

    /**
     * Sync WHMCS services to local database (optional/additional logic).
     */
    public function syncUserServices(User $user)
    {
        $remoteServices = $this->getUserServicesFromWhmcs($user);
        
        // This is where you would reconcile local user_services table if needed.
        // For now, we provide the raw data from WHMCS as requested.
        
        return $remoteServices;
    }
}
