<?php

declare(strict_types=1);

class Collection
{
    public function map(callable $callback): self
    {
        return $this;
    }

    public function filter(callable $callback): self
    {
        return $this;
    }
}

$collection = new Collection();

// Closure as argument - not allowed
$collection->map(function ($x) {
    return $x * 2;
});

// Arrow function as argument - not allowed
$collection->filter(fn($x) => $x > 1);

// String callable - not allowed
$stringCallable = 'strlen';
$collection->map($stringCallable);

// First-class callable syntax - not allowed
$collection->map(strlen(...));

// Valid: no callable arguments (would fail for other reasons)
$collection->process($data);
