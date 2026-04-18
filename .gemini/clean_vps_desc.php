<?php
use App\Models\Service;

$descriptions = [
    'H-KVM 1' => "1 Core CPU\n2 GB RAM\n30 GB NVMe SSD\n1 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
    'H-KVM 2' => "2 Cores CPU\n4 GB RAM\n60 GB NVMe SSD\n2 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
    'H-KVM 3' => "4 Cores CPU\n8 GB RAM\n120 GB NVMe SSD\n4 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
    'H-KVM 4' => "4 Cores CPU\n16 GB RAM\n200 GB NVMe SSD\n8 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
    'H-KVM 5' => "6 Cores CPU\n32 GB RAM\n300 GB NVMe SSD\n10 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
    'H-KVM 6' => "8 Cores CPU\n64 GB RAM\n500 GB NVMe SSD\n15 TB Bandwidth\n1 Gbps Port\n1 IPv4 Address",
];

foreach ($descriptions as $name => $desc) {
    Service::where('name', $name)->update(['description' => $desc]);
}

echo "Cleaned up VPS descriptions successfully.\n";
