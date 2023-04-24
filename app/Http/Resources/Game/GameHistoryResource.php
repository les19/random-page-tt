<?php

namespace App\Http\Resources\Game;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameHistoryResource extends JsonResource
{
    /**
     * @inheritDoc
     */
    public static $wrap = 'history';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            'gain'   => $this->gain,
            'is_win' => $this->is_win,
            'value'  => $this->value,
        ];
    }
}
