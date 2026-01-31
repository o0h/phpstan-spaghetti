<?php

declare(strict_types=1);

$x = 5;

// Ternary operator - not allowed
$result = $x > 0 ? 'positive' : 'not positive';

// Short ternary - not allowed
$value = $x ?: 'default';

// Nested ternary - not allowed
$category = $x > 10 ? 'large' : ($x > 5 ? 'medium' : 'small');
