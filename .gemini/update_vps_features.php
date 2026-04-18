<?php
use App\Models\Service;

$features = "🛠️ Root and SSH Full Access\n🛡️ Advanced DDoS Protection\n🎧 24/7 Premium Expert Support\n⚡ Dedicated 1 Gbps Uplink\n🚀 Instant Automated Deployment\n💾 Enterprise NVMe SSD Performance";

Service::where('category_id', 4)->update(['features' => $features]);

echo "Successfully updated VPS features list.\n";
