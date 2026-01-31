<?php

declare(strict_types=1);

// Try-catch - not allowed
try {
    riskyOperation();
} catch (Exception $e) {
    handleError($e);
} finally {
    cleanup();
}

// Try-catch without finally - not allowed
try {
    anotherOperation();
} catch (RuntimeException $e) {
    log($e);
}
