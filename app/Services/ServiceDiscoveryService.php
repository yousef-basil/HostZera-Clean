<?php

namespace App\Services;

use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceDiscoveryService
{
    /**
     * Get all active categories with their active services.
     */
    public function getActiveCategories()
    {
        return ServiceCategory::with(['services' => function ($query) {
            $query->where('is_active', true);
        }])->orderBy('order')->get();
    }

    /**
     * Get all active services.
     */
    public function getActiveServices()
    {
        return Service::where('is_active', true)->orderBy('order')->get();
    }

    /**
     * Get details of a single active service.
     */
    public function getServiceDetail($id)
    {
        return Service::where('is_active', true)->findOrFail($id);
    }
}
