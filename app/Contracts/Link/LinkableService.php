<?php

namespace App\Contracts\Link;

use App\Contracts\ModelableService;
use App\Models\Customer\Customer;
use App\Models\Link\Link;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface to customer interact
 */
interface LinkableService extends ModelableService
{
    /**
     * Generate link by customer
     *
     * @param  string|int $customerId
     * @return Link
     */
    public function generateByCustomer(string $customerId): Link;

    /**
     * Deactivate link
     *
     * @param  string $linkId
     * @return void
     */
    public function deactivateLink(string $linkId): void;

    public function getByCurrentCustomer(): Collection;

    public function getById(string $linkId): Link;
}
