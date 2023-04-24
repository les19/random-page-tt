<?php

namespace App\Http\Controllers\Customer;

use App\Contracts\Customer\CustomerableService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutCustomer extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerableService $service)
    {
        $service->removeCurrentCustomer();
    }
}
