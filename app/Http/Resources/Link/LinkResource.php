<?php

namespace App\Http\Resources\Link;

use App\Http\Resources\Game\GameResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    /**
     * @inheritDoc
     */
    public static $wrap = 'link';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->uuid,
            'game' => new GameResource($this->whenLoaded('game')),
        ];
    }
}
