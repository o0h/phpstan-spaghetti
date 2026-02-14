<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Functions;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions\NoCallableArgumentInStaticCallRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoCallableArgumentInStaticCallRule>
 */
final class NoCallableArgumentInStaticCallRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoCallableArgumentInStaticCallRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/callable-arguments-static.php'], [
            [
                'Closures cannot be passed as function arguments in spaghetti code. (Function: ArrayHelper::transform, Argument: #2)',
                21,
            ],
            [
                'Arrow functions cannot be passed as function arguments in spaghetti code. (Function: ArrayHelper::filterData, Argument: #2)',
                26,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code. (Function: ArrayHelper::transform, Argument: #2)',
                30,
            ],
            [
                'Callable values cannot be passed as function arguments in spaghetti code. (Function: ArrayHelper::transform, Argument: #2)',
                33,
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
