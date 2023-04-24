<?php

namespace App\Actions\Link;

use App\Models\Link\Link;
use Lorisleiva\Actions\Concerns\AsAction;

class DeactivateLink
{
    use AsAction;

    public function handle(Link $link)
    {
        $link->update([
            'is_active' => false
        ]);
    }
}
