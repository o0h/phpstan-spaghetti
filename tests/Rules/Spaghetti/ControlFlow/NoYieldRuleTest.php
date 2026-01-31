<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoYieldRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoYieldRule> */
final class NoYieldRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoYieldRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/yield.php'], [
            ['Yield expressions are not allowed in spaghetti code.', 8],
            ['Yield expressions are not allowed in spaghetti code.', 9],
            ['Yield expressions are not allowed in spaghetti code.', 10],
            ['Yield from expressions are not allowed in spaghetti code.', 16],
            ['Yield expressions are not allowed in spaghetti code.', 22],
            ['Yield expressions are not allowed in spaghetti code.', 23],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
