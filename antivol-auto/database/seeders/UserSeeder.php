<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1 Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@antivol.com'],
            [
                'name' => 'Super Admin',
                'phone' => '0000000000',
                'password' => Hash::make('password'),
                'status' => 'ACTIVE',
            ]
        );
        $admin->assignRole('admin');

        // 3 Agents
        for ($i = 1; $i <= 3; $i++) {
            $agent = User::create([
                'name' => "Agent $i",
                'email' => "agent$i@antivol.com",
                'phone' => "081000000$i",
                'password' => Hash::make('password'),
                'status' => 'ACTIVE',
                'agent_code' => 'AG-' . str_pad($i, 6, '0', STR_PAD_LEFT),
            ]);
            $agent->assignRole('agent');
        }

        // 5 Clients
        for ($i = 1; $i <= 5; $i++) {
            $client = User::create([
                'name' => "Client $i",
                'phone' => "099000000$i",
                'password' => Hash::make('1234'), // PIN
                'status' => 'ACTIVE',
            ]);
            $client->assignRole('client');
        }
    }
}
