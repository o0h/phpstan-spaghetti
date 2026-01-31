<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Operators;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators\NoTernaryOperatorRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoTernaryOperatorRule> */
final class NoTernaryOperatorRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoTernaryOperatorRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/ternary.php'], [
            ['Ternary operators (? :) are not allowed in spaghetti code. Use if statements with goto instead.', 8],
            ['Ternary operators (? :) are not allowed in spaghetti code. Use if statements with goto instead.', 11],
            ['Ternary operators (? :) are not allowed in spaghetti code. Use if statements with goto instead.', 14],
            ['Ternary operators (? :) are not allowed in spaghetti code. Use if statements with goto instead.', 14],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
