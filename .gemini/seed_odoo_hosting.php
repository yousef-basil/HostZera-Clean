<?php
use App\Models\Service;
use App\Models\ServiceCategory;

$category = ServiceCategory::where('slug', 'odoo-hosting')->first();

if($category) {
    Service::where('category_id', $category->id)->delete();

    $odooPlans = [
        [
            'name' => 'Odoo Starter', 'price' => 14.50,
            'description' => "2 vCPU\n4 GB RAM\n100 GB NVMe\n4 TB Traffic",
            'order' => 1
        ],
        [
            'name' => 'Odoo Business', 'price' => 29.50, 'badge' => 'Best Value',
            'description' => "4 vCPU\n12 GB RAM\n200 GB NVMe\n12 TB Traffic",
            'order' => 2
        ],
        [
            'name' => 'Odoo Enterprise', 'price' => 59.50,
            'description' => "8 vCPU\n24 GB RAM\n400 GB NVMe\n20 TB Traffic",
            'order' => 3
        ],
    ];

    $features = "Odoo + PostgreSQL Ready\nKVM - Ubuntu 22.04/24.04\nDDoS Protection\n24/7 Support\nFull Root Access\nAutomated Backups Support";

    foreach ($odooPlans as $plan) {
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
    echo "Successfully populated Odoo hosting plans.\n";
} else {
    echo "Odoo category not found.\n";
}
