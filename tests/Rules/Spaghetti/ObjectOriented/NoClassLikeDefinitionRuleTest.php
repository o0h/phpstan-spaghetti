<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\ObjectOriented;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented\NoClassLikeDefinitionRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<NoClassLikeDefinitionRule>
 */
final class NoClassLikeDefinitionRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoClassLikeDefinitionRule();
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/class-like.php'], [
            [
                'Class definitions are not allowed in spaghetti code.',
                6,
            ],
            [
                'Interface definitions are not allowed in spaghetti code.',
                17,
            ],
            [
                'Trait definitions are not allowed in spaghetti code.',
                23,
            ],
            [
                'Enum definitions are not allowed in spaghetti code.',
                32,
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
