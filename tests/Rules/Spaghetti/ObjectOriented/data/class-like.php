<?php

declare(strict_types=1);

// Class definition - not allowed
class MyClass
{
    public int $value;

    public function method(): void
    {
        echo "test";
    }
}

// Interface definition - not allowed
interface MyInterface
{
    public function method(): void;
}

// Trait definition - not allowed
trait MyTrait
{
    public function method(): void
    {
        echo "trait";
    }
}

// Enum definition - not allowed
enum Status
{
    case Active;
    case Inactive;
}
