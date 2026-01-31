<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ObjectOriented;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented\NoObjectAccessRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoObjectAccessRule>
 */
final class NoObjectAccessRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoObjectAccessRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/object-access.php'], [
            [
                'Method calls (->) are not allowed in spaghetti code.',
                8,
            ],
            [
                'Method calls (->) are not allowed in spaghetti code.',
                9,
            ],
            [
                'Nullsafe method calls (?->) are not allowed in spaghetti code.',
                12,
            ],
            [
                'Method calls (->) are not allowed in spaghetti code.',
                12,
            ],
            [
                'Property access (->) is not allowed in spaghetti code.',
                15,
            ],
            [
                'Property access (->) is not allowed in spaghetti code.',
                16,
            ],
            [
                'Nullsafe property access (?->) is not allowed in spaghetti code.',
                19,
            ],
            [
                'Property access (->) is not allowed in spaghetti code.',
                19,
            ],
            [
                'Static method calls (::) are not allowed in spaghetti code.',
                22,
            ],
            [
                'Static method calls (::) are not allowed in spaghetti code.',
                23,
            ],
            [
                'Static property access (::) is not allowed in spaghetti code.',
                26,
            ],
            [
                'Static property access (::) is not allowed in spaghetti code.',
                27,
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
