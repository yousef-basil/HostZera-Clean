<?php
use App\Models\Service;

Service::where('category_id', 3)->delete();

Service::create([
    'name' => 'WP Starter',
    'category_id' => 3,
    'price' => 4.99,
    'billing_cycle' => 'month',
    'description' => "1 Website\n10 GB SSD\n25,000 Visits/mo\nFree SSL Certificate\nAuto Updates\nDaily Backups",
    'features' => "Free SSL Certificate\nAuto WordPress Updates\nDaily Backups\n24/7 Support",
    'order' => 1,
    'is_active' => true
]);

Service::create([
    'name' => 'WP Business',
    'category_id' => 3,
    'price' => 9.99,
    'billing_cycle' => 'month',
    'badge_text' => 'Popular',
    'description' => "3 Websites\n30 GB SSD\n100,000 Visits/mo\nFree SSL Certificate\nAuto WordPress Updates\nDaily Backups",
    'features' => "Staging Environment\nFree CDN\n24/7 Expert Support\nDaily Backups",
    'order' => 2,
    'is_active' => true
]);

Service::create([
    'name' => 'WP Pro',
    'category_id' => 3,
    'price' => 19.99,
    'billing_cycle' => 'month',
    'description' => "10 Websites\n100 GB SSD\n500,000 Visits/mo\nFree SSL Certificate\nAuto WordPress Updates\nHourly Backups",
    'features' => "Priority Support\nStaging Environment\nFree CDN\nMalware Removal\nPerformance Optimization",
    'order' => 3,
    'is_active' => true
]);

echo "Successfully updated WordPress Hosting plans.\n";
