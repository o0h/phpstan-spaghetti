<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoThrowRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoThrowRule>
 */
final class NoThrowRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoThrowRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/throw.php'], [
            [
                'Throw statements are not allowed in spaghetti code. Handle errors with conditional checks and goto.',
                6,
            ],
        ]);
    }

    public function testThrowAsExpression(): void
    {
        $this->analyse([__DIR__ . '/data/throw-expression.php'], [
            [
                'Throw statements are not allowed in spaghetti code. Handle errors with conditional checks and goto.',
                6,
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
