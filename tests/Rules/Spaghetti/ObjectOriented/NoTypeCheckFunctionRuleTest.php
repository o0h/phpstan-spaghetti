<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ObjectOriented;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented\NoTypeCheckFunctionRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoTypeCheckFunctionRule> */
final class NoTypeCheckFunctionRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoTypeCheckFunctionRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/type-check-functions.php'], [
            ['Type check function is_a() is not allowed in spaghetti code. Spaghetti code shouldn\'t use objects anyway.', 9],
            ['Type check function is_subclass_of() is not allowed in spaghetti code. Spaghetti code shouldn\'t use objects anyway.', 10],
            ['Type check function get_class() is not allowed in spaghetti code. Spaghetti code shouldn\'t use objects anyway.', 11],
            ['Type check function get_parent_class() is not allowed in spaghetti code. Spaghetti code shouldn\'t use objects anyway.', 12],
        ]);
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
