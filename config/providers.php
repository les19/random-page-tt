<?php

use App\Services\Customer\CustomerService;
use App\Services\GameEngine\GameTypes\RandomWinLoseGameService;
use App\Services\Link\LinkService;

/**
 * U can use this to bind services, so the architecture will stay clean.
 */
return [
    'customerable' => CustomerService::class,
    'linkable'     => LinkService::class,
    'gameble'      => RandomWinLoseGameService::class,
];
