<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators;

use PhpParser\Node;
use PhpParser\Node\Expr\AssignOp\Coalesce as CoalesceAssign;
use PhpParser\Node\Expr\BinaryOp\Coalesce;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node>
 */
final class NoNullCoalesceRule implements Rule
{
    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof Coalesce) {
            return [
                RuleErrorBuilder::message('Null coalesce operator (??) is not allowed in spaghetti code.')
                    ->identifier('spaghetti.noNullCoalesce')
                    ->build(),
            ];
        }

        if ($node instanceof CoalesceAssign) {
            return [
                RuleErrorBuilder::message('Null coalesce assignment operator (??=) is not allowed in spaghetti code.')
                    ->identifier('spaghetti.noNullCoalesceAssign')
                    ->build(),
            ];
        }

        return [];
    }
}
