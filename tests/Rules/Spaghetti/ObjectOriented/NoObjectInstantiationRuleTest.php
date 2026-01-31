<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ObjectOriented;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented\NoObjectInstantiationRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoObjectInstantiationRule>
 */
final class NoObjectInstantiationRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoObjectInstantiationRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/object-instantiation.php'], [
            [
                'Object instantiation (new) is not allowed in spaghetti code.',
                6,
            ],
            [
                'Object instantiation (new) is not allowed in spaghetti code.',
                7,
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
