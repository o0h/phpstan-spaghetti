<?php

declare(strict_types=1);

// Function definition - not allowed
function calculate($a, $b)
{
    return $a + $b;
}

// Another function - not allowed
function processData(array $data): array
{
    return array_map('strtoupper', $data);
}

// Valid alternative: inline code with goto
$a = 5;
$b = 10;
$result = $a + $b;
echo $result;
