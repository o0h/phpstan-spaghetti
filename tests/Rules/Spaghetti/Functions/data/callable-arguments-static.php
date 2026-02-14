<?php

declare(strict_types=1);

class ArrayHelper
{
    public static function transform(array $data, callable $callback): array
    {
        return $data;
    }

    public static function filterData(array $data, callable $callback): array
    {
        return $data;
    }
}

$array = [1, 2, 3];

// Closure as argument - not allowed
ArrayHelper::transform($array, function ($x) {
    return $x * 2;
});

// Arrow function as argument - not allowed
ArrayHelper::filterData($array, fn($x) => $x > 1);

// String callable - not allowed
$stringCallable = 'strlen';
ArrayHelper::transform($array, $stringCallable);

// First-class callable syntax - not allowed
ArrayHelper::transform($array, strlen(...));

// Valid: no callable arguments (would fail for other reasons)
ArrayHelper::process($data);
