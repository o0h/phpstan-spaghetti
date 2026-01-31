<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ControlFlow;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow\NoReturnRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoReturnRule> */
final class NoReturnRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoReturnRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/return.php'], [
            ['Return statements are not allowed in spaghetti code. Use inline code and goto instead.', 8],
            ['Return statements are not allowed in spaghetti code. Use inline code and goto instead.', 14],
            ['Return statements are not allowed in spaghetti code. Use inline code and goto instead.', 21],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
