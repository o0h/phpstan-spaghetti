<?php

declare(strict_types=1);

namespace O0h\PHPStanSpaghetti\Rules\Spaghetti\Structure;

use PhpParser\Node;
use PhpParser\Node\Stmt\Namespace_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<Namespace_>
 */
final class NoNamespaceRule implements Rule
{
    public function getNodeType(): string
    {
        return Namespace_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        // Allow file-level namespace without name (global namespace)
        if ($node->name === null) {
            return [];
        }

        return [
            RuleErrorBuilder::message('Namespace declarations are not allowed in spaghetti code. Use global namespace only.')
                ->identifier('spaghetti.noNamespace')
                ->build(),
        ];
    }
}
