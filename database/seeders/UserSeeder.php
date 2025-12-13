<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as SpatieRole;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin BRNY',
            'phone' => '250000000',
            'password' => Hash::make('password'),
        ]);

        // Agent
        $agent = User::firstOrCreate([
            'email' => 'agent@example.com'
        ], [
            'name' => 'Agent Demo',
            'phone' => '250000001',
            'password' => Hash::make('password'),
        ]);

        // Client (no email)
        $client = User::firstOrCreate([
            'phone' => '250000002'
        ], [
            'name' => 'Client Demo',
            'password' => Hash::make('password'),
        ]);

        // assign roles using Spatie
        $admin->assignRole('admin');
        $agent->assignRole('agent');
        $client->assignRole('client');
    }
}
