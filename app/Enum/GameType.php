<?php

namespace App\Enum;

use App\Services\GameEngine\GameTypes\BaseGameService;
use App\Services\GameEngine\GameTypes\RandomWinLoseGameService;

enum GameType: int
{
    case RWL = 1;

    private function service(): string
    {
        return match ($this) {
            GameType::RWL     => RandomWinLoseGameService::class,
            default           => RandomWinLoseGameService::class,
        };
    }

    public function createService(): BaseGameService
    {
        return app()->make(
            $this->service()
        );
    }

    public function getService(): string
    {
        return $this->service();
    }
}
