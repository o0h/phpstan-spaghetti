<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Operators;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators\NoNullCoalesceRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoNullCoalesceRule> */
final class NoNullCoalesceRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoNullCoalesceRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/null-coalesce.php'], [
            ['Null coalesce operator (??) is not allowed in spaghetti code.', 8],
            ['Null coalesce operator (??) is not allowed in spaghetti code.', 11],
            ['Null coalesce operator (??) is not allowed in spaghetti code.', 11],
            ['Null coalesce assignment operator (??=) is not allowed in spaghetti code.', 14],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
