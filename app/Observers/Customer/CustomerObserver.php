<?php

namespace App\Observers\Customer;

use App\Jobs\Link\GenerateForCustomer;
use App\Models\Customer\Customer;

class CustomerObserver
{
    public function created(Customer $customer)
    {
        GenerateForCustomer::dispatch($customer->uuid);
    }
}
