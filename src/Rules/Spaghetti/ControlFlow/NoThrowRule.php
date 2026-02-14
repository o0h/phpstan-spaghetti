<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Expr\Throw_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Throw_>
 */
final class NoThrowRule implements Rule
{
    public function getNodeType(): string
    {
        return Throw_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Throw statements are not allowed in spaghetti code. Handle errors with conditional checks and goto.')
                ->identifier('spaghetti.noThrow')
                ->build(),
        ];
    }
}
