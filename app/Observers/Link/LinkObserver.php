<?php

namespace App\Observers\Link;

use App\Jobs\Link\GenerateGameByLink;
use App\Models\Link\Link;

class LinkObserver
{
    
    public function created(Link $link)
    {
        GenerateGameByLink::dispatch($link->uuid);
    }
}
