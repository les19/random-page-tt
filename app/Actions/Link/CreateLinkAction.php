<?php

namespace App\Actions\Link;

use App\Models\Link\Link;
use App\Services\BaseAuthService;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Str;

class CreateLinkAction
{
    use AsAction;

    public function handle(string $customerId = null)
    {
        if (is_null($customerId)) {
            $customerId = BaseAuthService::currentCustomer()->uuid;
        }

        return Link::create([
            'customer_id' => $customerId,
            'start_time'  => now(),
            'uuid'        => Str::uuid()->toString(),
        ]);
    }
}
