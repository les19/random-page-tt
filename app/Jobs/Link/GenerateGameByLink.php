<?php

namespace App\Jobs\Link;

use App\Contracts\GameEngine\GameLinkableService;
use App\Models\Link\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateGameByLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Link $link;

    /**
     * Create a new job instance.
     */
    public function __construct(string $linkId)
    {
        $this->link = Link::whereUuid($linkId)->first();
    }

    /**
     * Execute the job.
     */
    public function handle(GameLinkableService $service): void
    {
        $service->createGameFromLink($this->link);
    }
}
