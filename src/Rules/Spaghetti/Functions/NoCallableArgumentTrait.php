<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Expr\Closure;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\RuleErrorBuilder;

trait NoCallableArgumentTrait
{
    /**
     * @param Arg[] $args
     * @return list<\PHPStan\Rules\IdentifierRuleError>
     */
    private function checkCallableArguments(array $args, string $callableName, Scope $scope): array
    {
        $errors = [];

        foreach ($args as $index => $arg) {
            $value = $arg->value;
            $argPosition = $index + 1; // Human-readable position (1-based)

            // Direct closure or arrow function
            if ($value instanceof Closure) {
                $errors[] = RuleErrorBuilder::message(
                    sprintf(
                        'Closures cannot be passed as function arguments in spaghetti code. (Function: %s, Argument: #%d)',
                        $callableName,
                        $argPosition,
                    ),
                )
                    ->identifier('spaghetti.noCallableArg.closure')
                    ->build();
                continue;
            }

            if ($value instanceof ArrowFunction) {
                $errors[] = RuleErrorBuilder::message(
                    sprintf(
                        'Arrow functions cannot be passed as function arguments in spaghetti code. (Function: %s, Argument: #%d)',
                        $callableName,
                        $argPosition,
                    ),
                )
                    ->identifier('spaghetti.noCallableArg.arrowFunction')
                    ->build();
                continue;
            }

            // Type-based detection for callable types
            $argType = $scope->getType($value);
            if ($argType->isCallable()->yes()) {
                $errors[] = RuleErrorBuilder::message(
                    sprintf(
                        'Callable values cannot be passed as function arguments in spaghetti code. (Function: %s, Argument: #%d)',
                        $callableName,
                        $argPosition,
                    ),
                )
                    ->identifier('spaghetti.noCallableArg.callable')
                    ->build();
            }
        }

        return $errors;
    }
}
