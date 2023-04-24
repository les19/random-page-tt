<?php

namespace App\Exceptions\Link;

use Exception;
use Illuminate\Http\Response;

class LinkExpireOrNotActive extends Exception
{
    public function render(): Response
    {
        return response("Link expire or not active", 419);
    }

    public function report(): void
    {
        // DO NOTHING
    }
}
