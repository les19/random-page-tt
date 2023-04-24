<?php

namespace App\Http\Controllers\Game;

use App\Contracts\GameEngine\GamebleService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Game\GameHistoryResource;
use App\Models\Game\Game;
use Illuminate\Http\Request;

class GetGameHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Game $game, GamebleService $service)
    {
        return GameHistoryResource::collection(
            $service->getHistory($game)
        );
    }
}
