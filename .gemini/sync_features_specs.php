<?php
use App\Models\Service;

$services = Service::all();

foreach ($services as $service) {
    if ($service->description) {
        // Clean up the description to remove any emojis if they were left over
        $cleanDesc = $service->description;
        
        // General features we added before (avoiding duplication if already present)
        $generalFeatures = [
            "Full SSH and Root Access",
            "Advanced DDoS Protection",
            "24/7 Premium Expert Support",
            "Dedicated 1 Gbps Uplink",
            "Instant Automated Deployment",
            "Enterprise NVMe SSD Performance",
            "Dedicated Static IPv4 Address",
            "No Contracts or Hidden Setup Fees"
        ];
        
        $descLines = explode("\n", str_replace("\r", "", $cleanDesc));
        $featureLines = explode("\n", str_replace("\r", "", $service->features));
        
        // Combine: specs first, then features
        $newFeatureList = array_unique(array_merge($descLines, $featureLines));
        $newFeatures = implode("\n", array_filter($newFeatureList));
        
        $service->update(['features' => $newFeatures]);
    }
}

echo "Successfully synchronized features with specifications for all services.\n";
