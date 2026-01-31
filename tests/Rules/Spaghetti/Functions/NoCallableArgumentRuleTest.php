<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Functions;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions\NoCallableArgumentRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoCallableArgumentRule>
 */
final class NoCallableArgumentRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoCallableArgumentRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/callable-arguments.php'], [
            [
                'Closures cannot be passed as function arguments in spaghetti code.',
                8,
            ],
            [
                'Arrow functions cannot be passed as function arguments in spaghetti code.',
                13,
            ],
            [
                'Closures cannot be passed as function arguments in spaghetti code.',
                16,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code.',
                22,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code.',
                26,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code.',
                31,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code.',
                34,
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
