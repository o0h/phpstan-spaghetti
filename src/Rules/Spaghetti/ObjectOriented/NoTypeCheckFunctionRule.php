<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\ObjectOriented;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<FuncCall>
 */
final class NoTypeCheckFunctionRule implements Rule
{
    private const PROHIBITED_FUNCTIONS = [
        'is_a',
        'is_subclass_of',
        'get_class',
        'get_parent_class',
    ];

    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->name instanceof Node\Name) {
            return [];
        }

        $functionName = $node->name->toString();
        $lowerFunctionName = strtolower($functionName);

        if (!in_array($lowerFunctionName, self::PROHIBITED_FUNCTIONS, true)) {
            return [];
        }

        return [
            RuleErrorBuilder::message(sprintf(
                'Type check function %s() is not allowed in spaghetti code. Spaghetti code shouldn\'t use objects anyway.',
                $functionName,
            ))
                ->identifier('spaghetti.noTypeCheckFunction')
                ->build(),
        ];
    }
}
