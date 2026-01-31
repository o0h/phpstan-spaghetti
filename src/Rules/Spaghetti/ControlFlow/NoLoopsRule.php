<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Stmt>
 */
final class NoLoopsRule implements Rule
{
    public function getNodeType(): string
    {
        return Stmt::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof Stmt\For_) {
            return [
                RuleErrorBuilder::message('For loops are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noLoops.for')
                    ->build(),
            ];
        }

        if ($node instanceof Stmt\While_) {
            return [
                RuleErrorBuilder::message('While loops are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noLoops.while')
                    ->build(),
            ];
        }

        if ($node instanceof Stmt\Do_) {
            return [
                RuleErrorBuilder::message('Do-while loops are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noLoops.doWhile')
                    ->build(),
            ];
        }

        if ($node instanceof Stmt\Foreach_) {
            return [
                RuleErrorBuilder::message('Foreach loops are not allowed in spaghetti code. Use goto statements instead.')
                    ->identifier('spaghetti.noLoops.foreach')
                    ->build(),
            ];
        }

        return [];
    }
}
