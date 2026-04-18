<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserInventoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserServiceController extends Controller
{
    protected $userInventory;

    public function __construct(UserInventoryService $userInventory)
    {
        $this->userInventory = $userInventory;
    }

    /**
     * Display user services from WHMCS.
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();
        $services = $this->userInventory->getUserServicesFromWhmcs($user);

        return response()->json([
            'success' => true,
            'data' => $services,
            'message' => 'User services retrieved from WHMCS successfully'
        ]);
    }
}
