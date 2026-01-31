<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Trait_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<ClassLike>
 */
final class NoClassLikeDefinitionRule implements Rule
{
    public function getNodeType(): string
    {
        return ClassLike::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if ($node instanceof Class_) {
            return [
                RuleErrorBuilder::message('Class definitions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noClass')
                    ->build(),
            ];
        }

        if ($node instanceof Interface_) {
            return [
                RuleErrorBuilder::message('Interface definitions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noInterface')
                    ->build(),
            ];
        }

        if ($node instanceof Trait_) {
            return [
                RuleErrorBuilder::message('Trait definitions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noTrait')
                    ->build(),
            ];
        }

        if ($node instanceof Enum_) {
            return [
                RuleErrorBuilder::message('Enum definitions are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noEnum')
                    ->build(),
            ];
        }

        return [];
    }
}
