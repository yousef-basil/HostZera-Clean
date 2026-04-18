<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\WhmcsApiService;
use Illuminate\Support\Facades\Log;

class ProductSyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(WhmcsApiService $whmcs): void
    {
        Log::info('WHMCS Product sync started.');

        $products = $whmcs->getProducts();

        if ($products === null) {
            Log::error('WHMCS Product sync failed: API error.');
            return;
        }

        // Ensure we have a default category if none exists
        $defaultCategory = ServiceCategory::firstOrCreate(
            ['slug' => 'general'],
            ['name' => 'General', 'icon' => 'package']
        );

        foreach ($products as $product) {
            Service::updateOrCreate(
                ['whmcs_product_id' => $product['pid']],
                [
                    'name' => $product['name'],
                    'description' => $product['description'] ?? '',
                    // Simple logic to extract a price, can be refined based on currency/cycle
                    'price' => $product['pricing']['USD']['monthly'] ?? 0.00,
                    'billing_cycle' => $product['paytype'] ?? 'monthly',
                    'category_id' => $defaultCategory->id,
                    'is_active' => (isset($product['retired']) && $product['retired'] == '0'),
                ]
            );
        }

        Log::info('WHMCS Product sync completed. Processed ' . count($products) . ' products.');
    }
}
