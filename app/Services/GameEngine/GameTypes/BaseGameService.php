<?php

namespace App\Services\GameEngine\GameTypes;

use App\Actions\GameEngine\CreateGameFromLink;
use App\Actions\GameEngine\CreateGameHistory;
use App\Actions\GameEngine\GetGameHistory;
use App\Contracts\GameEngine\GamebleService;
use App\Contracts\GameEngine\GameLinkableService;
use App\Exceptions\GameEngine\GameRunFail;
use App\Models\Game\Game;
use App\Models\Game\GameHistory;
use App\Models\Link\Link;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

abstract class BaseGameService implements GamebleService, GameLinkableService
{
    protected string $name = 'base';
    protected Game   $game;

    public function getName(): string
    {
        return $this->name;
    }

    public function getHistory(Game $game): Collection
    {
        return GetGameHistory::run($game);
    }

    public function run(Game $game): GameHistory
    {
        DB::beginTransaction();

        try {

            if (!isset($this->game)) {
                $this->setGame($game);
            }

            $this->game();

            $history = CreateGameHistory::run($this);
        } catch (\Throwable $th) {
            DB::rollback();

            throw new GameRunFail($th->getMessage());
        }

        DB::commit();

        return $history;
    }

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function createGameFromLink(Link $link): Game
    {
        return CreateGameFromLink::run($link, $this);
    }
}
