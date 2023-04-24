<?php

namespace App\Http\Controllers\Customer;

use App\Contracts\Customer\CustomerableService;
use App\Exceptions\Customer\CantFindCurrentCustomer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\CustomerResource;

class GetCurrentCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerableService $service)
    {
        return new CustomerResource(
            $service->getCurrentCustomer()
        );
    }
}
