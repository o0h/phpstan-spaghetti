<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<MethodCall>
 */
final class NoCallableArgumentInMethodCallRule implements Rule
{
    use NoCallableArgumentTrait;

    public function getNodeType(): string
    {
        return MethodCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $methodName = $this->getMethodName($node);
        return $this->checkCallableArguments($node->getArgs(), $methodName, $scope);
    }

    private function getMethodName(MethodCall $node): string
    {
        $objectType = $node->var;
        $method = $node->name;

        $objectName = '<object>';
        if ($objectType instanceof Node\Expr\Variable && is_string($objectType->name)) {
            $objectName = '$' . $objectType->name;
        }

        $methodNameStr = '<dynamic method>';
        if ($method instanceof Identifier) {
            $methodNameStr = $method->toString();
        }

        return sprintf('%s->%s', $objectName, $methodNameStr);
    }
}
