<?php
use App\Models\Service;

$plans = [
    'WP Starter' => "🌐 1 Website\n💾 10 GB SSD\n🚀 25,000 Visits/mo\n🛡️ Free SSL Certificate\n🔄 Auto Updates\n📦 Daily Backups",
    'WP Business' => "🌐 3 Websites\n💾 30 GB SSD\n🚀 100,000 Visits/mo\n🛡️ Free SSL Certificate\n🔄 Auto WordPress Updates\n📦 Daily Backups",
    'WP Pro' => "🌐 10 Websites\n💾 100 GB SSD\n🚀 500,000 Visits/mo\n🛡️ Free SSL Certificate\n🔄 Auto WordPress Updates\n📦 Hourly Backups"
];

foreach ($plans as $name => $desc) {
    Service::where('name', $name)->update(['description' => $desc]);
}

echo "Successfully updated WP plan descriptions with emojis.\n";
