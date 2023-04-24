<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Link\LinkableService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\CreateLinkRequest;
use App\Http\Resources\Link\LinkResource;
use Illuminate\Http\Request;

class CreateLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LinkableService $service): LinkResource
    {
        return new LinkResource(
            $service->create()
        );
    }
}
