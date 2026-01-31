<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Operators;

use PhpParser\Node;
use PhpParser\Node\Expr\BinaryOp\Spaceship;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Spaceship>
 */
final class NoSpaceshipOperatorRule implements Rule
{
    public function getNodeType(): string
    {
        return Spaceship::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        return [
            RuleErrorBuilder::message('Spaceship operator (<=>) is not allowed in spaghetti code.')
                ->identifier('spaghetti.noSpaceship')
                ->build(),
        ];
    }
}
