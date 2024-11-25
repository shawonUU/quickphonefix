<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Administration',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'product-management',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'book-management',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'order-management',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'settings',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'content-management',
            'guard_name' => 'web',
        ]);
    }
}
