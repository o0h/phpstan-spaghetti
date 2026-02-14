<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Functions;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

/**
 * @implements Rule<StaticCall>
 */
final class NoCallableArgumentInStaticCallRule implements Rule
{
    use NoCallableArgumentTrait;

    public function getNodeType(): string
    {
        return StaticCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $methodName = $this->getStaticMethodName($node);
        return $this->checkCallableArguments($node->getArgs(), $methodName, $scope);
    }

    private function getStaticMethodName(StaticCall $node): string
    {
        $className = '<class>';
        if ($node->class instanceof Node\Name) {
            $className = $node->class->toString();
        }

        $methodNameStr = '<dynamic method>';
        if ($node->name instanceof Identifier) {
            $methodNameStr = $node->name->toString();
        }

        return sprintf('%s::%s', $className, $methodNameStr);
    }
}
