<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators;

use PhpParser\Node;
use PhpParser\Node\Expr\Instanceof_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Instanceof_>
 */
final class NoInstanceofRule implements Rule
{
    public function getNodeType(): string
    {
        return Instanceof_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Instanceof operator is not allowed in spaghetti code. Use simple type checks instead.')
                ->identifier('spaghetti.noInstanceof')
                ->build(),
        ];
    }
}
