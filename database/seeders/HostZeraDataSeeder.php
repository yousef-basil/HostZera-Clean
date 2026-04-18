<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class HostZeraDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Web Hosting
        $webHosting = ServiceCategory::updateOrCreate(['slug' => 'web-hosting'], [
            'name' => 'Web Hosting',
            'icon' => 'globe',
            'order' => 1
        ]);
        
        $this->createServices($webHosting->id, [
            ['name' => 'Bronze', 'price' => 3.99, 'desc' => "1 Website\n10 GB NVME\nUnlimited bandwidth\n5 Email Accounts\nFree CDN\nFree SSL"],
            ['name' => 'Silver', 'price' => 6.49, 'desc' => "3 Websites\n25 GB NVME\nUnlimited bandwidth\n10 Email Accounts\nFree CDN\nFree SSL"],
            ['name' => 'Diamond', 'price' => 9.99, 'desc' => "Unlimited Websites\n50 GB NVME\nUnlimited bandwidth\nUnlimited Email\nFree CDN\nFree SSL"]
        ]);

        // 2. WordPress Hosting
        $wpHosting = ServiceCategory::updateOrCreate(['slug' => 'wordpress-hosting'], [
            'name' => 'WordPress Hosting',
            'icon' => 'zap',
            'order' => 2
        ]);
        
        $this->createServices($wpHosting->id, [
            ['name' => 'WP Starter', 'price' => 4.99, 'desc' => "1 Website\n10 GB SSD\n25,000 Visits/mo\nFree SSL Certificate\nAuto Updates\nDaily Backups"],
            ['name' => 'WP Business', 'price' => 9.99, 'desc' => "3 Websites\n30 GB SSD\n100,000 Visits/mo\nFree SSL Certificate\nStaging Environment\nDaily Backups"],
            ['name' => 'WP Pro', 'price' => 19.99, 'desc' => "10 Websites\n100 GB SSD\n500,000 Visits/mo\nPriority Support\nFree CDN\nMalware Removal"]
        ]);

        // 3. Linux VPS
        $linuxVps = ServiceCategory::updateOrCreate(['slug' => 'linux-vps'], [
            'name' => 'Linux VPS',
            'icon' => 'server',
            'order' => 3
        ]);
        
        $this->createServices($linuxVps->id, [
            ['name' => 'H-KVM 1', 'price' => 5.99, 'desc' => "1 vCPU Core\n2 GB RAM\n30 GB NVMe Storage\n2 TB Traffic\n200 Mbps Port\nDDoS Protection"],
            ['name' => 'H-KVM 3', 'price' => 17.99, 'desc' => "3 vCPU Cores\n8 GB RAM\n150 GB NVMe Storage\n8 TB Traffic\n400-500 Mbps Port\nDDoS Protection"]
        ]);

        // 4. Windows VPS
        $windowsVps = ServiceCategory::updateOrCreate(['slug' => 'windows-vps'], [
            'name' => 'Windows VPS',
            'icon' => 'monitor',
            'order' => 4
        ]);
        
        $this->createServices($windowsVps->id, [
            ['name' => 'W-KVM 1', 'price' => 9.95, 'desc' => "2 vCPU Cores\n4 GB RAM\n60 GB NVMe Storage\n3 TB Traffic\nWindows OS Support\nRDP Access"],
            ['name' => 'W-KVM 3', 'price' => 24.50, 'desc' => "4 vCPU Cores\n8 GB RAM\n150 GB NVMe Storage\n8 TB Traffic\nWindows OS Support\nRDP Access"]
        ]);

        // 5. Reseller Hosting
        $reseller = ServiceCategory::updateOrCreate(['slug' => 'reseller-hosting'], [
            'name' => 'Reseller Hosting',
            'icon' => 'users',
            'order' => 5
        ]);
        
        $this->createServices($reseller->id, [
            ['name' => 'Starter Reseller', 'price' => 10.99, 'desc' => "50 GB NVME Space\nUnmetered Bandwidth\n10 cPanel Accounts\nWHM Access\nFree SSL"],
            ['name' => 'Pro Reseller', 'price' => 18.99, 'desc' => "100 GB NVME Storage\nUnmetered Bandwidth\n30 cPanel Accounts\nPriority Support\nFree SSL"]
        ]);

        // 6. Dedicated Server
        $dedicated = ServiceCategory::updateOrCreate(['slug' => 'dedicated-server'], [
            'name' => 'Dedicated Servers',
            'icon' => 'hard-drive',
            'order' => 6
        ]);
        
        $this->createServices($dedicated->id, [
            ['name' => 'Core Power', 'price' => 88.61, 'desc' => "Intel Xeon E3-1275v5\n64 GB DDR4 ECC RAM\n2 x 512 GB NVMe SSD\n1 Gbps Network Port\nUnlimited Traffic"],
            ['name' => 'Ryzen Beast', 'price' => 163.40, 'desc' => "AMD Ryzen 9 3900\n64 GB DDR4 ECC RAM\n2 x 1 TB NVMe SSD\n1 Gbps Network Port\nUnlimited Traffic"]
        ]);

        // 7. n8n Servers
        $n8n = ServiceCategory::updateOrCreate(['slug' => 'n8n-servers'], [
            'name' => 'n8n Servers',
            'icon' => 'zap',
            'order' => 7
        ]);
        
        $this->createServices($n8n->id, [
            ['name' => 'n8n Starter', 'price' => 14.95, 'desc' => "2 vCPU · 4 GB RAM\n100 GB NVMe\nUnlimited Workflows\n24/7 Support"],
            ['name' => 'n8n Business', 'price' => 69.95, 'desc' => "8 vCPU · 24 GB RAM\n400 GB NVMe\nUnlimited Workflows\nPriority Support"]
        ]);

        // 8. Odoo Hosting
        $odoo = ServiceCategory::updateOrCreate(['slug' => 'odoo-hosting'], [
            'name' => 'Odoo Hosting',
            'icon' => 'briefcase',
            'order' => 8
        ]);
        
        $this->createServices($odoo->id, [
            ['name' => 'Odoo Starter', 'price' => 14.50, 'desc' => "2 vCPU · 4 GB RAM\n100 GB NVMe\nOdoo + PostgreSQL Ready\nFull Root Access"],
            ['name' => 'Odoo Enterprise', 'price' => 59.50, 'desc' => "8 vCPU · 24 GB RAM\n400 GB NVMe\nLarge Odoo Databases\nFull Root Access"]
        ]);
    }

    private function createServices($categoryId, $data)
    {
        foreach ($data as $item) {
            Service::updateOrCreate(
                ['category_id' => $categoryId, 'name' => $item['name']],
                [
                    'price' => $item['price'],
                    'billing_cycle' => 'mo',
                    'description' => $item['desc'],
                    'is_active' => true,
                    'whmcs_product_id' => null
                ]
            );
        }
    }
}
