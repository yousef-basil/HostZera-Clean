<?php
use App\Models\Service;
use App\Models\ServiceCategory;

$category = ServiceCategory::where('slug', 'n8n-servers')->first();

if($category) {
    Service::where('category_id', $category->id)->delete();

    $n8nPlans = [
        [
            'name' => 'N8n Starter', 'price' => 14.95,
            'description' => "2 vCPU\n4 GB RAM\n100 GB NVMe\n4 TB Traffic",
            'order' => 1
        ],
        [
            'name' => 'N8n Pro', 'price' => 34.95, 'badge' => 'Best Value',
            'description' => "4 vCPU\n12 GB RAM\n200 GB NVMe\n12 TB Traffic",
            'order' => 2
        ],
        [
            'name' => 'N8n Business', 'price' => 69.95,
            'description' => "8 vCPU\n24 GB RAM\n400 GB NVMe\n20 TB Traffic",
            'order' => 3
        ],
    ];

    foreach ($n8nPlans as $plan) {
        $features = "n8n Ready (Docker)\nPostgreSQL\nDDoS Protection\n24/7 Support\nHardware Replacement Included";
        if($plan['name'] == 'N8n Pro') {
            $features = "Optimized for n8n Automation\nPostgreSQL + Redis\nDDoS Protection\n24/7 Support\nAdvanced Security Layer";
        } elseif($plan['name'] == 'N8n Business') {
            $features = "Heavy Workflows\nPostgreSQL + Redis\nDDoS Protection\n24/7 Support\nDedicated Infrastructure";
        }

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
    echo "Successfully updated N8N plans with exact prices and specs.\n";
}
