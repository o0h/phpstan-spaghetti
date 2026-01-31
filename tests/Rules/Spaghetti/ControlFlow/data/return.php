<?php

declare(strict_types=1);

// Return statement - not allowed
function getData()
{
    return [1, 2, 3];
}

// Return with value - not allowed
function calculate($x)
{
    return $x * 2;
}

// Early return - not allowed
function process($data)
{
    if (!$data) {
        return;
    }
    echo "processing";
}
