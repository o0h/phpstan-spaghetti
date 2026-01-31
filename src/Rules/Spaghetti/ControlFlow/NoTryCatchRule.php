<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Stmt\TryCatch;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<TryCatch>
 */
final class NoTryCatchRule implements Rule
{
    public function getNodeType(): string
    {
        return TryCatch::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Try-catch-finally blocks are not allowed in spaghetti code. Handle errors with conditional checks and goto.')
                ->identifier('spaghetti.noTryCatch')
                ->build(),
        ];
    }
}
