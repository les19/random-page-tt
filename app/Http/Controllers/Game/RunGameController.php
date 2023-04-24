<?php

namespace App\Http\Controllers\Game;

use App\Contracts\GameEngine\GamebleService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameHistoryResource;
use App\Models\Game\Game;
use Illuminate\Http\Request;

class RunGameController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Game $game, GamebleService $service): GameHistoryResource
    {
        return new GameHistoryResource(
            $service->run($game)
        );
    }
}
