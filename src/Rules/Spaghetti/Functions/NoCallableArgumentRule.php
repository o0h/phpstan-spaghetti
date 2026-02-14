<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<FuncCall>
 */
final class NoCallableArgumentRule implements Rule
{
    use NoCallableArgumentTrait;

    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $functionName = $this->getFunctionName($node);
        return $this->checkCallableArguments($node->getArgs(), $functionName, $scope);
    }

    private function getFunctionName(FuncCall $node): string
    {
        $name = $node->name;

        if ($name instanceof Node\Name) {
            return $name->toString();
        }

        if ($name instanceof Node\Expr\Variable && is_string($name->name)) {
            return '$' . $name->name . '()';
        }

        return '<dynamic function>';
    }
}
