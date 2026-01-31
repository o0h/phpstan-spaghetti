<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Tests\Rules\Spaghetti\Structure;

use O0h\PHPStanSpaghetti\Rules\Spaghetti\Structure\NoNamespaceRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/** @extends RuleTestCase<NoNamespaceRule> */
final class NoNamespaceRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new NoNamespaceRule();
    }
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/namespace.php'], [
            ['Namespace declarations are not allowed in spaghetti code. Use global namespace only.', 6],
        ]);
    }
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../../extension.neon'];
    }
}
