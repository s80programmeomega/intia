<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create(['name' => 'Head Office', 'location' => 'Yaoundé']);
        Branch::create(['name' => 'Intia-Douala', 'location' => 'Douala']);
        Branch::create(['name' => 'Intia-Yaounde', 'location' => 'Yaoundé']);
    }
}
