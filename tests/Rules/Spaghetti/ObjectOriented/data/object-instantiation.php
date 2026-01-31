<?php

declare(strict_types=1);

// Object instantiation - not allowed
$obj = new stdClass();
$obj2 = new MyClass("arg");

// Valid: no object instantiation
$x = 5;
$y = "string";
