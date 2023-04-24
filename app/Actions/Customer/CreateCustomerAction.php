<?php

namespace App\Actions\Customer;

use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Str;

class CreateCustomerAction
{
    use AsAction;
        
    /**
     * P.S. Could (should actually) be replaced by Data Object class in order to keep tests simple.
     *
     * @return void
     */
    public function __construct(
        protected CreateCustomerRequest $request
    ) {
        //
    }

    /**
     * Create customer
     *
     * @return Customer
     */
    public function handle()
    {
        return Customer::create(array_merge(
            [
                'uuid' => Str::uuid()->toString(),
            ],
            $this->request->safe()->toArray(),
        ));
    }
}
