<?php

declare(strict_types=1);

$x = 5;
$y = 10;

// Invalid: if with else
if ($x > 0) {
    echo "positive";
} else {
    echo "not positive";
}

// Invalid: if with elseif
if ($x === 1) {
    echo "one";
} elseif ($x === 2) {
    echo "two";
}

// Invalid: complex condition with &&
if ($x > 0 && $y > 0) goto both_positive;

// Invalid: complex condition with ||
if ($x > 5 || $y > 5) goto one_large;

// Invalid: complex condition with comparison
if ($x == $y) goto equal;

// Invalid: if without goto
if ($x > 0) {
    echo "something";
}

// Invalid: if with multiple statements
if ($x > 0) {
    $z = 1;
    goto next;
}

// Valid: simple condition with goto
if ($x) goto is_truthy;
if (!$x) goto is_falsy;

is_truthy:
echo "truthy";
goto end;

is_falsy:
echo "falsy";

end:
