<?php

namespace App\Services\Customer;

use App\Actions\Customer\CreateCustomerAction;
use App\Contracts\Customer\CustomerableService;
use App\Models\Customer\Customer;
use App\Services\BaseAuthService;
use App\Services\BaseService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 *  CustomerService
 */
class CustomerService extends BaseService implements CustomerableService
{

    public function modelName(): string
    {
        return Customer::class;
    }

    public function create(): Model
    {
        $customer = CreateCustomerAction::run();

        BaseAuthService::setCurrentCustomer($customer);

        return $customer;
    }

    public function getCurrentCustomer(): Authenticatable|null
    {
        return BaseAuthService::currentCustomer();
    }

    public function removeCurrentCustomer(): void
    {
        BaseAuthService::removeCurrentCustomer();
    }

}
