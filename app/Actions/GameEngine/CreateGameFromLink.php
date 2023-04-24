<?php

namespace App\Actions\GameEngine;

use App\Contracts\GameEngine\GamebleService;
use App\Models\Game\Game;
use App\Models\Link\Link;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateGameFromLink
{
    use AsAction;

    public function handle(Link $link, GamebleService $service): Game
    {
        return Game::create([
            'link_id' => $link->uuid,
            'name'    => $service->getName(),
            'type'    => $service->getType(),
        ]);
    }
}
