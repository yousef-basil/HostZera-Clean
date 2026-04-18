<?php
use App\Models\Service;

$features = "Full Administrator Access Control\nAdvanced Enterprise DDoS Protection\n24/7/365 Premium Expert Support\nHigh-Speed 1 Gbps Dedicated Uplink\nInstant Automated OS Deployment\nPure NVMe SSD Storage Performance\nDedicated Static IPv4 Address\nNo Contracts or Hidden Setup Fees";

Service::whereIn('category_id', [4, 5])->update(['features' => $features]);

echo "Successfully expanded all VPS features.\n";
