<?php

namespace App\Traits;

/**
 *  HasIsActive
 */
trait HasIsActive
{

    public function scopeActive($query)
    {
        return $query->whereIsActive(true);
    }

}
