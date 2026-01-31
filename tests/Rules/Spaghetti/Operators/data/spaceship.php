<?php

declare(strict_types=1);

$a = 5;
$b = 10;

// Spaceship operator - not allowed
$result = $a <=> $b;

// Spaceship in comparison - not allowed
$compare = ($a <=> $b) === 0;

// Spaceship in usort - not allowed
usort($array, fn($x, $y) => $x <=> $y);
