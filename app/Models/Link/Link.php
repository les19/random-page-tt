<?php

namespace App\Models\Link;

use App\Models\Game\Game;
use App\Traits\HasIsActive;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Link extends Model
{
    use HasFactory;
    use HasUuid;
    use HasIsActive;

    /**
     * @var array
     */
    protected $fillable = [
        'uuid',
        'is_active',
        'customer_id',
        'start_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];
    
    /**
     * Get the game associated with the Link
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function game(): HasOne
    {
        return $this->hasOne(Game::class, 'link_id', 'uuid');
    }

}

