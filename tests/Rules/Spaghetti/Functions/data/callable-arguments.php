<?php

declare(strict_types=1);

$array = [1, 2, 3];

// Closure as argument - not allowed
array_map(function ($x) {
    return $x * 2;
}, $array);

// Arrow function as argument - not allowed
array_filter($array, fn($x) => $x > 1);

// Named function with closure - not allowed
usort($array, function ($a, $b) {
    return $a <=> $b;
});

// String callable - not allowed
$stringCallable = 'strlen';
array_map($stringCallable, $array);

// Array callable (static method) - not allowed
$staticCallable = ['DateTime', 'createFromFormat'];
array_map($staticCallable, ['2024-01-01']);

// Array callable (instance method) - not allowed
$obj = new DateTime();
$instanceCallable = [$obj, 'format'];
array_map($instanceCallable, ['Y-m-d']);

// First-class callable syntax - not allowed
array_map(strlen(...), $array);

// Valid: no callable arguments
$result = processArray($array);
$value = calculate(1, 2);
