<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Operators;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators\NoSpaceshipOperatorRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoSpaceshipOperatorRule> */
final class NoSpaceshipOperatorRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoSpaceshipOperatorRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/spaceship.php'], [
            ['Spaceship operator (<=>) is not allowed in spaghetti code.', 9],
            ['Spaceship operator (<=>) is not allowed in spaghetti code.', 12],
            ['Spaceship operator (<=>) is not allowed in spaghetti code.', 15],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
