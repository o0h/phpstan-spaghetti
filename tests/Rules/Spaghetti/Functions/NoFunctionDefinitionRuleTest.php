<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Functions;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions\NoFunctionDefinitionRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoFunctionDefinitionRule>
 */
final class NoFunctionDefinitionRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoFunctionDefinitionRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/function-definition.php'], [
            [
                'Function definitions are not allowed in spaghetti code. Use inline code with goto statements instead.',
                6,
            ],
            [
                'Function definitions are not allowed in spaghetti code. Use inline code with goto statements instead.',
                12,
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
