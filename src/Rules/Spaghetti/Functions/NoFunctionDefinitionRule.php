<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node;
use PhpParser\Node\Stmt\Function_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Function_>
 */
final class NoFunctionDefinitionRule implements Rule
{
    public function getNodeType(): string
    {
        return Function_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Function definitions are not allowed in spaghetti code. Use inline code with goto statements instead.')
                ->identifier('spaghetti.noFunction')
                ->build(),
        ];
    }
}
