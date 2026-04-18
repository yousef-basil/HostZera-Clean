<?php
use App\Models\Service;

Service::where('category_id', 4)->delete();

$vpsPlans = [
    [
        'name' => 'H-KVM 1',
        'price' => 5.99,
        'description' => "⚙️ 1 Core CPU\n🧠 2 GB RAM\n💾 30 GB NVMe SSD\n🚀 1 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 1
    ],
    [
        'name' => 'H-KVM 2',
        'price' => 9.99,
        'description' => "⚙️ 2 Cores CPU\n🧠 4 GB RAM\n💾 60 GB NVMe SSD\n🚀 2 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 2
    ],
    [
        'name' => 'H-KVM 3',
        'price' => 17.99,
        'badge' => 'Best Seller',
        'description' => "⚙️ 4 Cores CPU\n🧠 8 GB RAM\n💾 120 GB NVMe SSD\n🚀 4 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 3
    ],
    [
        'name' => 'H-KVM 4',
        'price' => 24.99,
        'description' => "⚙️ 4 Cores CPU\n🧠 16 GB RAM\n💾 200 GB NVMe SSD\n🚀 8 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 4
    ],
    [
        'name' => 'H-KVM 5',
        'price' => 34.99,
        'description' => "⚙️ 6 Cores CPU\n🧠 32 GB RAM\n💾 300 GB NVMe SSD\n🚀 10 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 5
    ],
    [
        'name' => 'H-KVM 6',
        'price' => 49.99,
        'description' => "⚙️ 8 Cores CPU\n🧠 64 GB RAM\n💾 500 GB NVMe SSD\n🚀 15 TB Bandwidth\n🌐 1 Gbps Port\n🔌 1 IPv4 Address",
        'order' => 6
    ],
];

foreach ($vpsPlans as $plan) {
    Service::create([
        'name' => $plan['name'],
        'category_id' => 4,
        'price' => $plan['price'],
        'billing_cycle' => 'month',
        'badge_text' => $plan['badge'] ?? null,
        'description' => $plan['description'],
        'features' => "Full Root Access\nInstant Deployment\nScalable Infrastructure\n24/7 Support",
        'order' => $plan['order'],
        'is_active' => true
    ]);
}

echo "Successfully populated Linux VPS plans.\n";
