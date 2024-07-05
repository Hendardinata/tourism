<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin'
            ],
            ['name' => 'admin',]
        );

        $role_writer = Role::updateOrCreate(
            [
                'name' => 'writer'
            ],
            ['name' => 'writer',]
        );

        $role_guest = Role::updateOrCreate(
            [
                'name' => 'guest'
            ],
            ['name' => 'guest',]
        );

        $permission = Permission::updateOrcreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard',]
        );

        $role_admin->givePermissionTo($permission);
    }
}
