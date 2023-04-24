<?php

namespace App\Actions\GameEngine;

use App\Contracts\GameEngine\GamebleService;
use App\Models\Game\GameHistory;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateGameHistory
{
    use AsAction;

    public function handle(GamebleService $service): GameHistory
    {
        return GameHistory::create([
            'game_id' => $service->getGame()->id,
            'is_win'  => $service->isWin(),
            'value'   => $service->value(),
            'gain'    => $service->gain()
        ]);
    }
}
