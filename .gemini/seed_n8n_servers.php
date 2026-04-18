<?php
use App\Models\Service;
use App\Models\ServiceCategory;

$category = ServiceCategory::where('slug', 'n8n-servers')->first();

if($category) {
    Service::where('category_id', $category->id)->delete();

    $n8nPlans = [
        [
            'name' => 'N8n Basic', 'price' => 29.00,
            'description' => "2 Cores CPU\n4 GB RAM\n40 GB NVMe SSD Storage",
            'order' => 1
        ],
        [
            'name' => 'N8n Pro', 'price' => 49.00, 'badge' => 'Most Popular',
            'description' => "4 Cores CPU\n8 GB RAM\n80 GB NVMe SSD Storage",
            'order' => 2
        ],
        [
            'name' => 'N8n Business', 'price' => 89.00,
            'description' => "8 Cores CPU\n16 GB RAM\n160 GB NVMe SSD Storage",
            'order' => 3
        ],
    ];

    $features = "N8n pre-installed\nAutomated Daily Backups\nDedicated IP Address\nGlobal Network\nRoot Access\n24/7 Expert Support";

    foreach ($n8nPlans as $plan) {
        Service::create([
            'name' => $plan['name'],
            'category_id' => $category->id,
            'price' => $plan['price'],
            'billing_cycle' => 'mo',
            'badge_text' => $plan['badge'] ?? null,
            'description' => $plan['description'],
            'features' => $features,
            'order' => $plan['order'],
            'is_active' => true
        ]);
    }

    include '.gemini/sync_features_specs.php';
    echo "Successfully populated N8N plans.\n";
} else {
    echo "N8N category not found.\n";
}
