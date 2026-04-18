<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ServiceDiscoveryService;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    protected $serviceDiscovery;

    public function __construct(ServiceDiscoveryService $serviceDiscovery)
    {
        $this->serviceDiscovery = $serviceDiscovery;
    }

    /**
     * Display categories with their services.
     */
    public function categories(): JsonResponse
    {
        $categories = $this->serviceDiscovery->getActiveCategories();

        return response()->json([
            'success' => true,
            'data' => CategoryResource::collection($categories),
            'message' => 'Categories retrieved successfully'
        ]);
    }

    /**
     * Display all active services.
     */
    public function index(): JsonResponse
    {
        $services = $this->serviceDiscovery->getActiveServices();

        return response()->json([
            'success' => true,
            'data' => ServiceResource::collection($services),
            'message' => 'Services retrieved successfully'
        ]);
    }

    /**
     * Display a specific service.
     */
    public function show($id): JsonResponse
    {
        $service = $this->serviceDiscovery->getServiceDetail($id);

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
            'message' => 'Service details retrieved successfully'
        ]);
    }
}
