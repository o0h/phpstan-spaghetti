<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<FuncCall>
 */
final class NoCallableArgumentRule implements Rule
{
    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];

        foreach ($node->getArgs() as $arg) {
            $value = $arg->value;

            // Direct closure or arrow function
            if ($value instanceof Closure) {
                $errors[] = RuleErrorBuilder::message('Closures cannot be passed as function arguments in spaghetti code.')
                    ->identifier('spaghetti.noCallableArg.closure')
                    ->build();
                continue;
            }

            if ($value instanceof ArrowFunction) {
                $errors[] = RuleErrorBuilder::message('Arrow functions cannot be passed as function arguments in spaghetti code.')
                    ->identifier('spaghetti.noCallableArg.arrowFunction')
                    ->build();
                continue;
            }

            // Type-based detection for callable types
            $argType = $scope->getType($value);
            if ($argType->isCallable()->yes()) {
                $errors[] = RuleErrorBuilder::message('Callable values cannot be passed as function arguments in spaghetti code.')
                    ->identifier('spaghetti.noCallableArg.callable')
                    ->build();
            }
        }

        return $errors;
    }
}
