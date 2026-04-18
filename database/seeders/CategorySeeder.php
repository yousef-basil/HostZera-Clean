<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Shared Hosting', 'slug' => 'shared-hosting', 'icon' => 'server', 'order' => 1],
            ['name' => 'VPS Hosting', 'slug' => 'vps-hosting', 'icon' => 'microchip', 'order' => 2],
            ['name' => 'Dedicated Servers', 'slug' => 'dedicated-servers', 'icon' => 'database', 'order' => 3],
            ['name' => 'Domain Names', 'slug' => 'domains', 'icon' => 'globe', 'order' => 4],
        ];

        foreach ($categories as $cat) {
            \App\Models\ServiceCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
