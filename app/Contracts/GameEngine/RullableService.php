<?php

namespace App\Contracts\GameEngine;

use App\Models\Game\GameRule;
use App\Enum\GameType;

interface RullableService
{
    /**
     * findRuleByType
     *
     * @param  \Enum\GameType $type
     * @return \App\Models\Game\GameRule
     *
     * @throws \App\Exceptions\GameEngine\RuleNotFound
     */
    public function findRuleByType(GameType $type): GameRule;
    
    /**
     * Apply rule
     *
     * @param  \App\Models\Game\GameRule $rule
     * @return mixed
     */
    public function applyRule(GameRule $rule): mixed;
}
