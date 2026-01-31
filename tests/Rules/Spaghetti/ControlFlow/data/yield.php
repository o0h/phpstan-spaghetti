<?php

declare(strict_types=1);

// Yield - not allowed
function generator()
{
    yield 1;
    yield 2;
    yield 3;
}

// Yield from - not allowed
function delegateGenerator()
{
    yield from [1, 2, 3];
}

// Yield with key - not allowed
function keyValueGenerator()
{
    yield 'a' => 1;
    yield 'b' => 2;
}
