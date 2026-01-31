<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Structure;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Structure\NoTypeDeclarationRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoTypeDeclarationRule> */
final class NoTypeDeclarationRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoTypeDeclarationRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/type-declaration.php'], [
            ['Parameter type declarations are not allowed in spaghetti code.', 6],
            ['Return type declarations are not allowed in spaghetti code.', 12],
            ['Parameter type declarations are not allowed in spaghetti code.', 18],
            ['Parameter type declarations are not allowed in spaghetti code.', 18],
            ['Return type declarations are not allowed in spaghetti code.', 18],
            ['Parameter type declarations are not allowed in spaghetti code.', 24],
            ['Return type declarations are not allowed in spaghetti code.', 24],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
