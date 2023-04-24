<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Base interface to model interact
 */
interface ModelableService {
    
    /**
     * Create model
     *
     * @return Model
     */
    public function create(): Model;

}
