<?php

if (!function_exists('mirror_comparison_operator')) {
    function mirror_comparison_operator(string $operator)
    {
        return match ($operator) {
            '>'  => '<',
            '<'  => '>',
            '>=' => '<=',
            '<=' => '>=',
            default => '>',
        };
    }
}
