<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators;

use PhpParser\Node;
use PhpParser\Node\Expr\Ternary;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Ternary>
 */
final class NoTernaryOperatorRule implements Rule
{
    public function getNodeType(): string
    {
        return Ternary::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Ternary operators (? :) are not allowed in spaghetti code. Use if statements with goto instead.')
                ->identifier('spaghetti.noTernary')
                ->build(),
        ];
    }
}
