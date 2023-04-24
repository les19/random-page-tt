<?php

namespace App\Contracts\Customer;

use App\Contracts\ModelableService;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Interface to customer interact
 */
interface CustomerableService extends ModelableService {

    /**
     * Get model
     *
     * @return Model|null
     */
    public function getCurrentCustomer(): Authenticatable|null;
    
    /**
     * Remove current customer
     *
     * @return void
     */
    public function removeCurrentCustomer(): void;

}
