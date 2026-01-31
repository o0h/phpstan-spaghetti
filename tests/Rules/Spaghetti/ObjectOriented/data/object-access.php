<?php

declare(strict_types=1);

$obj = getObject(); // assume this returns an object

// Method call - not allowed
$obj->method();
$result = $obj->calculate(1, 2);

// Nullsafe method call - not allowed
$obj?->method();

// Property fetch - not allowed
$value = $obj->property;
$obj->property = 5;

// Nullsafe property fetch - not allowed
$value = $obj?->property;

// Static method call - not allowed
MyClass::staticMethod();
$result = MyClass::calculate(1, 2);

// Static property fetch - not allowed
$value = MyClass::$staticProperty;
MyClass::$staticProperty = 5;

// Valid: no object access
$x = getValue();
$y = calculate(1, 2);
