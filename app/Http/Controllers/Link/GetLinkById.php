<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Link\LinkableService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Link\LinkResource;
use Illuminate\Http\Request;

class GetLinkById extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $linkId, LinkableService $service)
    {
        return new LinkResource(
            $service->getById($linkId),
        );
    }
}
