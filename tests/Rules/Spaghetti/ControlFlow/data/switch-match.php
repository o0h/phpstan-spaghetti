<?php

declare(strict_types=1);

$value = 5;

// Switch statement - not allowed
switch ($value) {
    case 1:
        echo "one";
        break;
    case 2:
        echo "two";
        break;
    default:
        echo "other";
}

// Match expression - not allowed
$result = match ($value) {
    1 => "one",
    2 => "two",
    default => "other",
};

// Valid alternative: goto-based branching
if ($value === 1) goto case_one;
if ($value === 2) goto case_two;
goto case_default;

case_one:
echo "one";
goto end;

case_two:
echo "two";
goto end;

case_default:
echo "other";

end:
