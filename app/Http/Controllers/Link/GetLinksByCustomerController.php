<?php

namespace App\Http\Controllers\Link;

use App\Contracts\Link\LinkableService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Link\LinkResource;
use Illuminate\Http\Request;

class GetLinksByCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * P.S. or we can use CustomerService and something like customer->links relation.
     * It's kinda obviously, so I don't want it and used a "repository" way.
     */
    public function __invoke(LinkableService $service)
    {
        return LinkResource::collection(
            $service->getByCurrentCustomer()
        );
    }
}
