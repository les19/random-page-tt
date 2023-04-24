<?php

namespace App\Exceptions\Customer;

use Exception;
use Illuminate\Http\Response;

class CantFindCurrentCustomer extends Exception
{
    public function render(): Response
    {
        return response("Can't find current customer", 404);
    }

    public function report(): void
    {
        // DO NOTHING
    }
}
