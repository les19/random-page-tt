<?php

namespace App\Http\Controllers\Customer;

use App\Contracts\Customer\CustomerableService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Resources\Customer\CustomerResource;

class CreateCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CustomerableService $service): CustomerResource
    {
        return new CustomerResource(
            $service->create()
        );
    }
}
