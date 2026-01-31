<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Expr\Match_;
use PhpParser\Node\Stmt\Switch_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node>
 */
final class NoSwitchMatchRule implements Rule
{
    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof Switch_) {
            return [
                RuleErrorBuilder::message('Switch statements are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noSwitch')
                    ->build(),
            ];
        }

        if ($node instanceof Match_) {
            return [
                RuleErrorBuilder::message('Match expressions are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noMatch')
                    ->build(),
            ];
        }

        return [];
    }
}
