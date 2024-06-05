<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Relative;
use App\Models\Reward;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(Relative::factory(5))
            ->has(
                Family::factory(2)
                ->has(Reward::factory(20))
                ->has(Task::factory(20))
            )
            ->create();

    }
}
