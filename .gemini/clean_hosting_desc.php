<?php
use App\Models\Service;

// Web Hosting (Category 1)
$webServices = Service::where('category_id', 1)->get();
foreach($webServices as $s) {
    // Basic clean: remove emojis
    $cleanDesc = preg_replace('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{1F1E0}-\x{1F1FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', '', $s->description);
    $s->update(['description' => trim($cleanDesc)]);
}

// WordPress Hosting (Category 3)
$wpServices = Service::where('category_id', 3)->get();
foreach($wpServices as $s) {
    $cleanDesc = preg_replace('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{1F1E0}-\x{1F1FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', '', $s->description);
    $s->update(['description' => trim($cleanDesc)]);
}

// Global Re-Sync to make sure features list is comprehensive and clean
include '.gemini/sync_features_specs.php';

echo "Cleaned descriptions and synced features for Hostings.\n";
