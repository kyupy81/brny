<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin', 'agent', 'client'];
        foreach ($roles as $r) {
            SpatieRole::firstOrCreate(['name' => $r]);
        }

        $permissions = [
            'registrations.create',
            'registrations.view',
            'registrations.validate',
            'registrations.export',
            'vehicles.search',
            'vehicles.report_theft',
            'users.manage'
        ];

        foreach ($permissions as $p) {
            SpatiePermission::firstOrCreate(['name' => $p]);
        }

        $admin = SpatieRole::where('name', 'admin')->first();
        $agent = SpatieRole::where('name', 'agent')->first();
        $client = SpatieRole::where('name', 'client')->first();

        // assign permissions
        $allPermissions = SpatiePermission::all()->pluck('name')->toArray();
        foreach ($allPermissions as $permName) {
            $admin->givePermissionTo($permName);
        }

        $agentPerms = ['registrations.create', 'registrations.view', 'vehicles.search', 'vehicles.report_theft'];
        $agent->givePermissionTo($agentPerms);

        $clientPerms = ['vehicles.search', 'vehicles.report_theft'];
        $client->givePermissionTo($clientPerms);
    }
}
