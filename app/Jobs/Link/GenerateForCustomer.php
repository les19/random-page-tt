<?php

namespace App\Jobs\Link;

use App\Contracts\Link\LinkableService;
use App\Models\Customer\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateForCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected string $customerId
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(LinkableService $service): void
    {
        $service->generateByCustomer($this->customerId);
    }
}
