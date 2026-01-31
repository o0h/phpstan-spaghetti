<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoLoopsRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoLoopsRule>
 */
final class NoLoopsRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoLoopsRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/loops.php'], [
            [
                'For loops are not allowed in spaghetti code. Use goto statements instead.',
                6,
            ],
            [
                'While loops are not allowed in spaghetti code. Use goto statements instead.',
                11,
            ],
            [
                'Do-while loops are not allowed in spaghetti code. Use goto statements instead.',
                16,
            ],
            [
                'Foreach loops are not allowed in spaghetti code. Use goto statements instead.',
                21,
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
