<?php

namespace App\Models\Customer;

use App\Traits\HasUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use HasFactory;
    use HasUuid;

    /**
     * @var array
     */
    protected $fillable = [
        'phone',
        'name',
        'uuid',
    ];
 

}
