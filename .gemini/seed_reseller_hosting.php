<?php
use App\Models\Service;

Service::where('category_id', 6)->delete();

$resellerPlans = [
    [
        'name' => 'Starter Reseller', 'price' => 10.99,
        'description' => "50 GB NVMe Storage\nUnlimited Bandwidth\nUp to 25 WHM Accounts",
        'order' => 1
    ],
    [
        'name' => 'Pro Reseller', 'price' => 18.99, 'badge' => 'Most Popular',
        'description' => "100 GB NVMe Storage\nUnlimited Bandwidth\nUp to 50 WHM Accounts",
        'order' => 2
    ],
    [
        'name' => 'Elite Reseller', 'price' => 29.99,
        'description' => "200 GB NVMe Storage\nUnlimited Bandwidth\nUp to 100 WHM Accounts",
        'order' => 3
    ],
];

$features = "Free SSL Certificates\nWHM Access\nLiteSpeed + Advanced Cache\nPriority Support\nFree Migration Assistance\nFree .com domain with Annual Billing\nWhite-Label Branding\nDaily Security Monitoring";

foreach ($resellerPlans as $plan) {
    Service::create([
        'name' => $plan['name'],
        'category_id' => 6,
        'price' => $plan['price'],
        'billing_cycle' => 'month',
        'badge_text' => $plan['badge'] ?? null,
        'description' => $plan['description'],
        'features' => $features,
        'order' => $plan['order'],
        'is_active' => true
    ]);
}

include '.gemini/sync_features_specs.php';

echo "Successfully populated and synced Reseller Hosting plans.\n";
