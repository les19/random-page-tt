<?php

namespace App\Services;

use App\Exceptions\Customer\CantFindCurrentCustomer;
use App\Models\Customer\Customer;
use App\Services\BaseService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 *  BaseAuthService
 */
class BaseAuthService
{

    public static function currentCustomer(): Authenticatable|null
    {
        $customer = Auth::user();

        if(!$customer){
            throw new CantFindCurrentCustomer;
        }

        return $customer;
    }

    public static function removeCurrentCustomer()
    {
        Auth::logout();
    }

    public static function setCurrentCustomer(Customer $customer): void
    {
        Auth::login($customer);
    }

}
