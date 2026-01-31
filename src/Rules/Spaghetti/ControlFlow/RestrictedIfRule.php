<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ControlFlow;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\BinaryOp;
use PhpParser\Node\Stmt\Goto_;
use PhpParser\Node\Stmt\If_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<If_>
 */
final class RestrictedIfRule implements Rule
{
    public function getNodeType(): string
    {
        return If_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];

        // Check for else or elseif
        if ($node->else !== null) {
            $errors[] = RuleErrorBuilder::message('Else clauses are not allowed in spaghetti code.')
                ->identifier('spaghetti.if.noElse')
                ->build();
        }

        if (count($node->elseifs) > 0) {
            $errors[] = RuleErrorBuilder::message('Elseif clauses are not allowed in spaghetti code.')
                ->identifier('spaghetti.if.noElseif')
                ->build();
        }

        // Check for complex conditions (binary operations like &&, ||, etc.)
        if ($this->isComplexCondition($node->cond)) {
            $errors[] = RuleErrorBuilder::message('Complex if conditions (&&, ||, ==, !=, etc.) are not allowed in spaghetti code. Use unary conditions only.')
                ->identifier('spaghetti.if.unaryConditionOnly')
                ->build();
        }

        // Check that the body contains only goto
        if (count($node->stmts) !== 1 || !($node->stmts[0] instanceof Goto_)) {
            $errors[] = RuleErrorBuilder::message('If statement body without a single goto statement is not allowed in spaghetti code.')
                ->identifier('spaghetti.if.gotoOnly')
                ->build();
        }

        return $errors;
    }

    private function isComplexCondition(Expr $cond): bool
    {
        // Allow simple variables, function calls, and unary operations (!, etc.)
        // Disallow binary operations (&&, ||, ==, !=, <, >, etc.)

        if ($cond instanceof BinaryOp) {
            // All binary operations are considered complex
            return true;
        }

        // Recursively check child nodes for unary operations
        if ($cond instanceof Expr\BooleanNot) {
            return $this->isComplexCondition($cond->expr);
        }

        if ($cond instanceof Expr\UnaryMinus || $cond instanceof Expr\UnaryPlus) {
            return $this->isComplexCondition($cond->expr);
        }

        // Variables, function calls, etc. are simple
        return false;
    }
}
