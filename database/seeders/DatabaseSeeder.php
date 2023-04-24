<?php

namespace Database\Seeders;

use Database\Seeders\GameEngine\RWLGameRulesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RWLGameRulesSeeder::class);
    }
}
