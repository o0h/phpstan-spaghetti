<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\NullsafeMethodCall;
use PhpParser\Node\Expr\NullsafePropertyFetch;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\StaticPropertyFetch;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Expr>
 */
final class NoObjectAccessRule implements Rule
{
    public function getNodeType(): string
    {
        return Expr::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        // Check nullsafe variants first to avoid double-reporting
        if ($node instanceof NullsafeMethodCall) {
            return [
                RuleErrorBuilder::message('Nullsafe method calls (?->) are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noNullsafeMethodCall')
                    ->build(),
            ];
        }

        if ($node instanceof NullsafePropertyFetch) {
            return [
                RuleErrorBuilder::message('Nullsafe property access (?->) is not allowed in spaghetti code.')
                    ->identifier('spaghetti.noNullsafePropertyFetch')
                    ->build(),
            ];
        }

        if ($node instanceof MethodCall) {
            return [
                RuleErrorBuilder::message('Method calls (->) are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noMethodCall')
                    ->build(),
            ];
        }

        if ($node instanceof PropertyFetch) {
            return [
                RuleErrorBuilder::message('Property access (->) is not allowed in spaghetti code.')
                    ->identifier('spaghetti.noPropertyFetch')
                    ->build(),
            ];
        }

        if ($node instanceof StaticCall) {
            return [
                RuleErrorBuilder::message('Static method calls (::) are not allowed in spaghetti code.')
                    ->identifier('spaghetti.noStaticCall')
                    ->build(),
            ];
        }

        if ($node instanceof StaticPropertyFetch) {
            return [
                RuleErrorBuilder::message('Static property access (::) is not allowed in spaghetti code.')
                    ->identifier('spaghetti.noStaticPropertyFetch')
                    ->build(),
            ];
        }

        return [];
    }
}
