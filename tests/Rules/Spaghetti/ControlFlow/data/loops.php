<?php

declare(strict_types=1);

// For loop - not allowed
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

// While loop - not allowed
while ($x > 0) {
    $x--;
}

// Do-while loop - not allowed
do {
    $y++;
} while ($y < 5);

// Foreach loop - not allowed
foreach ($array as $item) {
    echo $item;
}

// Valid alternative: goto-based loop
$i = 0;
loop_start:
if ($i >= 10) goto loop_end;
echo $i;
$i++;
goto loop_start;
loop_end:
