<?php

namespace App\Contracts\GameEngine;

use App\Models\Game\Game;
use App\Models\Link\Link;

interface GameLinkableService
{
    public function createGameFromLink(Link $link): Game;
}
