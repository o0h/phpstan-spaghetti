<?php

declare(strict_types=1);

$data = null;

// Null coalesce operator - not allowed
$value = $data ?? 'default';

// Chained null coalesce - not allowed
$result = $data ?? $fallback ?? 'final default';

// Null coalesce assignment - not allowed
$data ??= 'assigned value';
