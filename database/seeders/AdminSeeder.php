<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::updateOrCreate(
            ['email' => 'admin@hostzera.com'],
            [
                'name'           => 'HostZera Admin',
                'password'       => \Illuminate\Support\Facades\Hash::make('password'),
                'is_super_admin' => true,
            ]
        );
    }
}
