<?php

namespace App\Contracts\GameEngine;

use App\Models\Game\Game;
use App\Models\Game\GameHistory;
use App\Models\Link\Link;
use App\Enum\GameType;
use Illuminate\Database\Eloquent\Collection;

interface GamebleService
{
    public function run(Game $game): GameHistory;

    public function getHistory(Game $game): Collection;
    
    public function setGame(Game $game): void;

    public function getType(): GameType;

    public function getGame(): Game;

    public function game(): static;

    public function isWin(): bool;

    public function value(): int;
    
    public function gain(): float;

    public function getName(): string;

}
