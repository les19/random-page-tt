<?php

namespace App\Actions\GameEngine;

use App\Models\Game\Game;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetGameHistory
{
    use AsAction;

    const COUNT = 3;

    public function handle(Game $game): Collection
    {
        return $game->history()->latest()->limit(static::COUNT)->get();
    }
}
