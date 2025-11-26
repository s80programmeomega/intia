<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BranchSeeder::class,
            CustomerSeeder::class,
            PolicySeeder::class,
        ]);

        // Admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@intia.com',
            'role' => 'Admin',
            'branch_id' => 1,
        ]);
        // Agent user
        User::factory()->create([
            'name' => 'Agent User',
            'email' => 'agent@intia.com',
            'role' => 'Agent',
            'branch_id' => 2,
        ]);
    }
}
