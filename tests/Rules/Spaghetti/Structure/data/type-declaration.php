<?php

declare(strict_types=1);

// Parameter type declaration - not allowed
function processString(string $input)
{
    return strtoupper($input);
}

// Return type declaration - not allowed
function getData(): array
{
    return [1, 2, 3];
}

// Both parameter and return type - not allowed
function calculate(int $a, int $b): int
{
    return $a + $b;
}

// Union type - not allowed
function handleValue(string|int $value): string|int
{
    return $value;
}
