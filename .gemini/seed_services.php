<?php
use App\Models\Service;

Service::where('category_id', 1)->delete();

Service::create([
    'name' => 'Starter Plan',
    'category_id' => 1,
    'price' => 2.99,
    'billing_cycle' => 'month',
    'features' => "1 Website\n10GB SSD Storage\n100GB Bandwidth\nFree SSL Certificate\n24/7 Support",
    'order' => 1,
    'is_active' => true
]);

Service::create([
    'name' => 'Professional Plan',
    'category_id' => 1,
    'price' => 5.99,
    'billing_cycle' => 'month',
    'badge_text' => 'Most Popular',
    'features' => "10 Websites\n50GB SSD Storage\nUnlimited Bandwidth\nFree Domain (1yr)\nFree Daily Backups\n24/7 Support",
    'order' => 2,
    'is_active' => true
]);

Service::create([
    'name' => 'Business Plan',
    'category_id' => 1,
    'price' => 9.99,
    'billing_cycle' => 'month',
    'features' => "Unlimited Websites\nUnlimited SSD Storage\nUnlimited Bandwidth\nSpecialized Support\nFree Security Suite\nPremium Performance",
    'order' => 3,
    'is_active' => true
]);

echo "Successfully updated Web Hosting plans.\n";
