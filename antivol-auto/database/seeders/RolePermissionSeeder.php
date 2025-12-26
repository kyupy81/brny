<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'users.manage',
            'users.import',
            'admins.manage',
            'agents.manage',
            'agents.badge.print',
            'registrations.create',
            'registrations.view.own',
            'registrations.view.all',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Super Admin
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // Admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'users.manage',
            'users.import',
            'agents.manage',
            'agents.badge.print',
            'registrations.view.all',
        ]);

        // Agent
        $agentRole = Role::firstOrCreate(['name' => 'agent']);
        $agentRole->givePermissionTo([
            'registrations.create',
            'registrations.view.own',
        ]);

        // Client
        $clientRole = Role::firstOrCreate(['name' => 'client']);
    }
}
