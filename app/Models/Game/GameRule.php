<?php

namespace App\Models\Game;

use App\Enum\GameType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_type',
        'value',
        'operator',
        'percentage',
    ];

    public function scopeByOperatorValue($query)
    {
        return $query
            ->orderBy('operator')
            ->orderByDesc('value');
    }

    public function scopeByGameType($query, GameType $type)
    {
        return $query->where('game_type', $type->value);
    }
}
