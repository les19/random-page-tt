<?php

namespace App\Services\GameEngine\GameTypes;

use App\Contracts\GameEngine\RullableService;
use App\Exceptions\GameEngine\RuleNotFound;
use App\Models\Game\GameHistory;
use App\Models\Game\GameRule;
use App\Services\GameEngine\GameTypes\BaseGameService;
use App\Enum\GameType;
use Exception;

/**
 *  RandomWinLoseGameService
 */
class RandomWinLoseGameService extends BaseGameService implements RullableService
{
    protected string $name = 'Imfeelinglucky';
    protected int    $value;
    protected float  $gain;

    public function getType(): GameType
    {
        return GameType::RWL;
    }

    public function game(): static
    {
        $this->value = random_int(0, 1000);

        if ($this->isWin()) {
            $rule = $this->findRuleByType($this->getType());
            $this->gain = $this->applyRule($rule);
        } else {
            $this->gain = 0;
        }

        return $this;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function gain(): float
    {
        return $this->gain;
    }

    public function isWin(): bool
    {
        return $this->value % 2 === 0;
    }

    public function applyRule(GameRule $rule): mixed
    {
        return $this->value * $rule->percentage / 100;
    }
    
    /**
     * Find rule by type
     *
     * @param  GameType $type
     * @return GameRule
     */
    public function findRuleByType(GameType $type): GameRule
    {
        $rules = GameRule::byGameType($type)
            ->get();

        $query = GameRule::query();

        $rules->each(
            function($rule) use ($query) {
                $query->orWhereIn(
                    'id',
                    function($sub) use ($rule) {
                        return $sub->select('id')
                            ->from('game_rules')
                            ->where(
                                'value',
                                $rule->operator,
                                $this->value
                            )
                            ->where('id', $rule->id);
                    }
                );
            }
        );

        $rule = $query->first();

        if(!$rule){
            throw new RuleNotFound('Rule not found');
        }

        return $rule;
    }
}
