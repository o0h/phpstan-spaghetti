<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\RestrictedIfRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<RestrictedIfRule>
 */
final class RestrictedIfRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new RestrictedIfRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/if-restricted.php'], [
            [
                'Else clauses are not allowed in spaghetti code.',
                9,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                9,
            ],
            [
                'If statement body without a single goto statement is not allowed in spaghetti code.',
                9,
            ],
            [
                'Elseif clauses are not allowed in spaghetti code.',
                16,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                16,
            ],
            [
                'If statement body without a single goto statement is not allowed in spaghetti code.',
                16,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                23,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                26,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                29,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                32,
            ],
            [
                'If statement body without a single goto statement is not allowed in spaghetti code.',
                32,
            ],
            [
                'Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.',
                37,
            ],
            [
                'If statement body without a single goto statement is not allowed in spaghetti code.',
                37,
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
