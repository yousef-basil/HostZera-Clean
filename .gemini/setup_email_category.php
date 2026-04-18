<?php
use App\Models\ServiceCategory;
use App\Models\Service;

// Find or Create the Email Hosting Category
$emailCategory = ServiceCategory::firstOrCreate(
    ['slug' => 'email-hosting'],
    ['name' => 'Email Hosting']
);

// Update category properties for the homepage display
$emailCategory->update([
    'icon' => 'mail',
    'description' => 'Professional business email',
    'features' => "IMAP/POP3\nWebmail\nAnti-spam",
    'order' => 8,
    'is_active' => true
]);

// Clear old ones just in case
Service::where('category_id', $emailCategory->id)->delete();

// Add the default plan to show the "$1.99 /mo" price
Service::create([
    'name' => 'Basic Email',
    'category_id' => $emailCategory->id,
    'price' => 1.99,
    'billing_cycle' => 'mo',
    'description' => "10 GB Storage\nUnlimited Email Accounts",
    'features' => "IMAP/POP3\nWebmail\nAnti-spam included\n24/7 Support",
    'order' => 1,
    'is_active' => true
]);

echo "Email Hosting category and plan updated successfully.\n";
