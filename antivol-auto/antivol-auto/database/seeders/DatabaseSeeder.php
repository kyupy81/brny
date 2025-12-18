<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@antivol.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '0000000000'
        ]);

        // Agent
        $agentUser = User::create([
            'name' => 'Agent One',
            'email' => 'agent@antivol.com',
            'password' => Hash::make('password'),
            'role' => 'agent',
            'status' => 'active',
            'phone' => '1111111111'
        ]);

        Agent::create([
            'user_id' => $agentUser->id,
            'zone' => 'Zone A'
        ]);
    }
}