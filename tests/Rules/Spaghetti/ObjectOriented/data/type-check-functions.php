<?php

declare(strict_types=1);

$obj = getObject();
$className = 'Exception';

// Type check functions - not allowed
$check1 = is_a($obj, $className);
$check2 = is_subclass_of($obj, $className);
$check3 = get_class($obj);
$check4 = get_parent_class($obj);

// This should be allowed (not a type check function)
$check5 = is_string($obj);
