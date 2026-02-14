<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Functions;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions\NoCallableArgumentInMethodCallRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoCallableArgumentInMethodCallRule>
 */
final class NoCallableArgumentInMethodCallRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoCallableArgumentInMethodCallRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/callable-arguments-method.php'], [
            [
                'Closures cannot be passed as function arguments in spaghetti code. (Function: $collection->map, Argument: #1)',
                21,
            ],
            [
                'Arrow functions cannot be passed as function arguments in spaghetti code. (Function: $collection->filter, Argument: #1)',
                26,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code. (Function: $collection->map, Argument: #1)',
                30,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code. (Function: $collection->map, Argument: #1)',
                33,
            ],
        ]);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../../../../extension.neon',
        ];
    }
}
