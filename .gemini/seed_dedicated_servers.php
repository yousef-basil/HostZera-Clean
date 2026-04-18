<?php
use App\Models\Service;

Service::where('category_id', 7)->delete();

$dedicatedPlans = [
    [
        'name' => 'Core', 'price' => 88.61,
        'description' => "Intel Xeon E3-1270v6 CPU\n32 GB DDR4 ECC RAM\n2 x 512 GB NVMe SSD Storage\n1 Gbps Network Port\nUnlimited Traffic\n1 IPv4 Address\n1 Gbps Germany Datacenter",
        'order' => 1
    ],
    [
        'name' => 'Power', 'price' => 93.43, 'badge' => 'Most Popular',
        'description' => "AMD Ryzen 5 3600 CPU\n64 GB DDR4 ECC RAM\n2 x 512 GB NVMe SSD Storage\n1 Gbps Network Port\nUnlimited Traffic\n1 IPv4 Address\n1 Gbps Germany Datacenter",
        'order' => 2
    ],
    [
        'name' => 'Prime', 'price' => 163.40,
        'description' => "AMD Ryzen 9 3900X CPU\n64 GB DDR4 ECC RAM\n2 x 1 TB NVMe SSD Storage\n1 Gbps Network Port\nUnlimited Traffic\n1 IPv4 Address\n1 Gbps Germany Datacenter",
        'order' => 3
    ],
];

$features = "Full Root Access\nDDoS Protection\n24/7 Technical Support\nHardware Replacement Included\nFree Email Support\nFree Phone Support";

foreach ($dedicatedPlans as $plan) {
    Service::create([
        'name' => $plan['name'],
        'category_id' => 7,
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

echo "Successfully populated and synced Dedicated Server plans.\n";
