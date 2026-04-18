<?php
use App\Models\Service;
use App\Models\ServiceCategory;

$emailCategory = ServiceCategory::where('slug', 'email-hosting')->first();

if($emailCategory) {
    // Basic Starter
    $starter = Service::where('category_id', $emailCategory->id)->where('name', 'Business Email Starter')->first();
    if($starter) {
        $starter->update([
            'price' => 39.00,
            'description' => "10 Email Accounts\n10 GB SSD Storage"
        ]);
    }

    // Growth
    $growth = Service::where('category_id', $emailCategory->id)->where('name', 'Business Email Growth')->first();
    if($growth) {
        $growth->update([
            'price' => 69.00,
            'description' => "30 Email Accounts\n30 GB SSD Storage"
        ]);
    }

    // Corporate
    $corporate = Service::where('category_id', $emailCategory->id)->where('name', 'Business Email Corporate')->first();
    if($corporate) {
        $corporate->update([
            'price' => 119.00,
            'description' => "75 Email Accounts\n75 GB SSD Storage"
        ]);
    }

    include '.gemini/sync_features_specs.php';
    echo "Successfully updated Email Hosting prices and specs.\n";
} else {
    echo "Email Hosting category not found.\n";
}
