<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Operators;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators\NoInstanceofRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoInstanceofRule> */
final class NoInstanceofRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoInstanceofRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/instanceof.php'], [
            ['Instanceof operator is not allowed in spaghetti code. Use simple type checks instead.', 8],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
