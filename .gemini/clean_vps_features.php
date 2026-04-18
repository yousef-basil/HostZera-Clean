<?php
use App\Models\Service;

$features = "Full SSH and Root Access\nAdvanced DDoS Protection\n24/7 Premium Expert Support\nDedicated 1 Gbps Uplink\nInstant Automated Deployment\nEnterprise NVMe SSD Performance";

Service::where('category_id', 4)->update(['features' => $features]);

echo "Successfully updated VPS features (clean version).\n";
