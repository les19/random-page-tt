<?php

namespace Database\Seeders\GameEngine;

use App\Models\Game\GameRule;
use App\Enum\GameType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RWLGameRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'operator'   => '<',
                'value'      => 900,
                'percentage' => 70,
            ],
            [
                'operator'   => '<',
                'value'      => 600,
                'percentage' => 50,
            ],
            [
                'operator'   => '<',
                'value'      => 300,
                'percentage' => 30,
            ],
            [
                'operator'   => '>=',
                'value'      => 300,
                'percentage' => 10,
            ],
        ])->each(
            function ($rule) {
                GameRule::create(
                    array_merge(
                        $rule,
                        [
                            'game_type' => GameType::RWL->value,
                        ],
                    )
                );
            }
        );
    }
}
