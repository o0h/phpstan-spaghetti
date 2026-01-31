<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Expr\Yield_;
use PhpParser\Node\Expr\YieldFrom;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node>
 */
final class NoYieldRule implements Rule
{
    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof Yield_) {
            return [
                RuleErrorBuilder::message('Yield expressions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noYield')
                    ->build(),
            ];
        }

        if ($node instanceof YieldFrom) {
            return [
                RuleErrorBuilder::message('Yield from expressions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noYieldFrom')
                    ->build(),
            ];
        }

        return [];
    }
}
