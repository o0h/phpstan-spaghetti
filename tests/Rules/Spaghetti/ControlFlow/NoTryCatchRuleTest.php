<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoTryCatchRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoTryCatchRule>
 */
final class NoTryCatchRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoTryCatchRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/try-catch.php'], [
            [
                'Try-catch-finally blocks are not allowed in spaghetti code. Handle errors with conditional checks and goto.',
                6,
            ],
            [
                'Try-catch-finally blocks are not allowed in spaghetti code. Handle errors with conditional checks and goto.',
                15,
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
