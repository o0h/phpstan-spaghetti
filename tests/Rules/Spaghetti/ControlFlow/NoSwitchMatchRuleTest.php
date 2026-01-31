<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoSwitchMatchRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoSwitchMatchRule>
 */
final class NoSwitchMatchRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoSwitchMatchRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/switch-match.php'], [
            [
                'Switch statements are not allowed in spaghetti code. Use goto statements instead.',
                8,
            ],
            [
                'Match expressions are not allowed in spaghetti code. Use goto statements instead.',
                20,
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
