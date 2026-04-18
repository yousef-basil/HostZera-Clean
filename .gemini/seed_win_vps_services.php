<?php
use App\Models\Service;

Service::where('category_id', 5)->delete();

$winPlans = [
    [
        'name' => 'W-KVM 1', 'price' => 9.95,
        'description' => "2 Cores CPU\n2 GB RAM\n50 GB NVMe Storage\nUnlimited Bandwidth\n100 Mbps Dedicated Port\n1 IPv4 Address",
        'order' => 1
    ],
    [
        'name' => 'W-KVM 2', 'price' => 14.75,
        'description' => "4 Cores CPU\n4 GB RAM\n80 GB NVMe Storage\nUnlimited Bandwidth\n250 Mbps Dedicated Port\n1 IPv4 Address",
        'order' => 2
    ],
    [
        'name' => 'W-KVM 3', 'price' => 24.50, 'badge' => 'Most Popular',
        'description' => "6 Cores CPU\n8 GB RAM\n120 GB NVMe Storage\nUnlimited Bandwidth\n500 Mbps Dedicated Port\n1 IPv4 Address",
        'order' => 3
    ],
    [
        'name' => 'W-KVM 4', 'price' => 34.25,
        'description' => "8 Cores CPU\n16 GB RAM\n200 GB NVMe Storage\nUnlimited Bandwidth\n750 Mbps Dedicated Port\n1 IPv4 Address",
        'order' => 4
    ],
    [
        'name' => 'W-KVM 5', 'price' => 49.40,
        'description' => "10 Cores CPU\n32 GB RAM\n350 GB NVMe Storage\nUnlimited Bandwidth\n1 Gbps Dedicated Port\n1 IPv4 Address",
        'order' => 5
    ],
    [
        'name' => 'W-KVM 6', 'price' => 69.60,
        'description' => "12 Cores CPU\n64 GB RAM\n500 GB NVMe Storage\nUnlimited Bandwidth\n1 Gbps Dedicated Port\n1 IPv4 Address",
        'order' => 6
    ],
];

$features = "Full RDP Access\nWindows Server 2019/2022\nAdvanced DDoS Protection\n24/7 Expert Support\nInstant Setup";

foreach ($winPlans as $plan) {
    Service::create([
        'name' => $plan['name'],
        'category_id' => 5,
        'price' => $plan['price'],
        'billing_cycle' => 'month',
        'badge_text' => $plan['badge'] ?? null,
        'description' => $plan['description'],
        'features' => $features,
        'order' => $plan['order'],
        'is_active' => true
    ]);
}

echo "Successfully populated Windows VPS plans.\n";
