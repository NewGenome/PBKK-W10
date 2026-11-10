<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::firstOrCreate(['name' => 'delete data']);
        Permission::firstOrCreate(['name' => 'view data']);

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->syncPermissions(['delete data', 'view data']);

        $staff = Role::firstOrCreate(['name' => 'Staf']);
        $staff->syncPermissions(['view data']);
    }
}