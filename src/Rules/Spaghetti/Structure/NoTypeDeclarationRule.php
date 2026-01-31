<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Structure;

use PhpParser\Node;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Stmt\Property;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Node>
 */
final class NoTypeDeclarationRule implements Rule
{
    public function getNodeType(): string
    {
        return Node::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];

        // Check function/method parameters
        if ($node instanceof FunctionLike) {
            foreach ($node->getParams() as $param) {
                if ($param->type !== null) {
                    $errors[] = RuleErrorBuilder::message('Parameter type declarations are not allowed in spaghetti code.')
                        ->identifier('spaghetti.noParamType')
                        ->line($param->getLine())
                        ->build();
                }
            }

            // Check return type
            if ($node->getReturnType() !== null) {
                $errors[] = RuleErrorBuilder::message('Return type declarations are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noReturnType')
                    ->build();
            }
        }

        // Check property types (in classes, which are also forbidden, but for completeness)
        if ($node instanceof Property && $node->type !== null) {
            $errors[] = RuleErrorBuilder::message('Property type declarations are not allowed in spaghetti code.')
                ->identifier('spaghetti.noPropertyType')
                ->build();
        }

        return $errors;
    }
}
