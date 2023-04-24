<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Link\LinkableService;
use App\Http\Controllers\Controller;

class DeactivateLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $linkId, LinkableService $service)
    {
        $service->deactivateLink($linkId);
    }
}
