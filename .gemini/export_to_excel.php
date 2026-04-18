<?php
use App\Models\Service;

$services = Service::with('category')->get();
$filename = "services_export.csv";
$handle = fopen($filename, 'w');

// Add UTF-8 BOM for Excel Arabic support
fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

// Header
fputcsv($handle, ['ID', 'Service Name', 'Category', 'Price', 'Billing Cycle', 'Badge', 'Description', 'Features']);

foreach ($services as $s) {
    fputcsv($handle, [
        $s->id,
        $s->name,
        $s->category->name ?? 'N/A',
        $s->price,
        $s->billing_cycle,
        $s->badge_text,
        $s->description,
        $s->features
    ]);
}

fclose($handle);
echo "Exported " . $services->count() . " services to $filename\n";
