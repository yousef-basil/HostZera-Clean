<?php
use App\Models\Service;
use App\Models\ServiceCategory;

$emailCategory = ServiceCategory::where('slug', 'email-hosting')->first();

if($emailCategory) {
    Service::where('category_id', $emailCategory->id)->delete();

    $emailPlans = [
        [
            'name' => 'Business Email Starter', 'price' => 35.00,
            'description' => "10 Email Accounts\n10 GB SSD Storage",
            'order' => 1
        ],
        [
            'name' => 'Business Email Growth', 'price' => 65.00,
            'description' => "30 Email Accounts\n30 GB SSD Storage",
            'order' => 2
        ],
        [
            'name' => 'Business Email Corporate', 'price' => 110.00,
            'description' => "70 Email Accounts\n70 GB SSD Storage",
            'order' => 3
        ],
    ];

    $commonFeatures = "Webmail Access\nMobile Sync (IMAP / POP / SMTP)\nAdvanced Spam Protection\nEmail Forwarders\nAuto Responders\nSSL Secure Mail";

    foreach ($emailPlans as $plan) {
        
        $featuresToUse = $commonFeatures;
        if($plan['name'] == 'Business Email Corporate') {
             $featuresToUse = "All Starter Features\nPriority Support\nDedicated IP Address\nActive Directory Sync";
        }

        Service::create([
            'name' => $plan['name'],
            'category_id' => $emailCategory->id,
            'price' => $plan['price'],
            'billing_cycle' => 'Annually',
            'description' => $plan['description'],
            'features' => $featuresToUse,
            'order' => $plan['order'],
            'is_active' => true
        ]);
    }

    include '.gemini/sync_features_specs.php';
    echo "Successfully populated Email Hosting plans.\n";
} else {
    echo "Email Hosting category not found.\n";
}
