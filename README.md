# PHPStan Spaghetti

[![Latest Stable Version](https://poser.pugx.org/o0h/phpstan-spaghetti/v)](https://packagist.org/packages/o0h/phpstan-spaghetti)
[![Total Downloads](https://poser.pugx.org/o0h/phpstan-spaghetti/downloads)](https://packagist.org/packages/o0h/phpstan-spaghetti)
[![License](https://poser.pugx.org/o0h/phpstan-spaghetti/license)](https://packagist.org/packages/o0h/phpstan-spaghetti)
[![PHPUnit](https://github.com/o0h/phpstan-spaghetti/workflows/PHPUnit/badge.svg)](https://github.com/o0h/phpstan-spaghetti/actions?query=workflow%3APHPUnit)
[![PHPStan](https://github.com/o0h/phpstan-spaghetti/workflows/PHPStan/badge.svg)](https://github.com/o0h/phpstan-spaghetti/actions?query=workflow%3APHPStan)
[![Coding Standard](https://github.com/o0h/phpstan-spaghetti/workflows/Coding%20Standard/badge.svg)](https://github.com/o0h/phpstan-spaghetti/actions?query=workflow%3A%22Coding+Standard%22)

A PHPStan extension that enforces true spaghetti code principles in your PHP projects.

## Why?

While most static analysis tools try to improve code quality, PHPStan Spaghetti takes a different approach: it ensures your code stays true to the classic spaghetti code style. No more clean, maintainable code - embrace the chaos!

## Installation

Install via Composer:

```bash
composer require --dev o0h/phpstan-spaghetti
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
<summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include `extension.neon` in your project's PHPStan config:

```neon
includes:
    - vendor/o0h/phpstan-spaghetti/extension.neon
```
</details>

## Configuration

The extension is enabled by default. To disable the rules, add the following to your `phpstan.neon`:

```neon
parameters:
    spaghettiRules:
        enabled: false
```

To explicitly enable (default behavior):

```neon
parameters:
    spaghettiRules:
        enabled: true
```

## Rules

PHPStan Spaghetti provides 16 rules organized into 5 categories to enforce true spaghetti code principles.

### Control Flow

#### NoLoopsRule

Prohibits all loop constructs (for, while, do-while, foreach). Use `goto` statements instead.

**Violation:**
```php
foreach ($items as $item) {
    process($item);
}
```

**Compliant:**
```php
$i = 0;
$count = count($items);
loop_start:
$done = $i >= $count;
if ($done)
    goto loop_end;
goto do_process;

do_process:
process($items[$i]);
$i++;
goto loop_start;

loop_end:
```

#### RestrictedIfRule

Enforces strict rules for `if` statements:
- No `else` or `elseif` clauses
- Only unary conditions (no `&&`, `||`, etc.)
- Body must contain only a single `goto` statement

#### NoSwitchMatchRule

Prohibits `switch` and `match` expressions. Use chains of `if` and `goto` instead.

#### NoTryCatchRule

Prohibits `try-catch-finally` blocks. Handle errors with conditional checks and `goto`.

#### NoReturnRule

Prohibits `return` statements. Use inline code and `goto` instead.

#### NoYieldRule

Prohibits `yield` and `yield from` expressions. No generators allowed in spaghetti code.

### Functions

#### NoFunctionDefinitionRule

Prohibits user-defined functions. Use inline code with `goto` statements instead.

#### NoCallableArgumentRule

Prohibits using callable types as function arguments (closures, arrow functions, string callables, etc.).

### Object-Oriented Programming

#### NoClassLikeDefinitionRule

Prohibits all class-like definitions (classes, interfaces, traits, enums). Spaghetti code should be procedural!

#### NoObjectInstantiationRule

Prohibits object instantiation with `new` keyword.

#### NoObjectAccessRule

Prohibits accessing object properties and methods (`->`, `::`, `?->`).

### Operators

#### NoTernaryOperatorRule

Prohibits ternary operators (`? :`). Use `if` statements with `goto` instead.

#### NoNullCoalesceRule

Prohibits null coalesce operators (`??`, `??=`).

#### NoSpaceshipOperatorRule

Prohibits spaceship operator (`<=>`).

### Structure

#### NoNamespaceRule

Prohibits namespace declarations. Use global namespace only.

#### NoTypeDeclarationRule

Prohibits type declarations for parameters, return values, and properties.

## Development

### Running Tests

```bash
composer test
```

### Code Style

Check code style:
```bash
composer cs-check
```

Fix code style:
```bash
composer cs-fix
```

### Static Analysis

```bash
composer phpstan
```

### Run All Checks

```bash
composer ci
```

## Requirements

- PHP 8.2 or higher
- PHPStan 2.0 or higher

## License

MIT

## Disclaimer

This package is intended for educational and entertainment purposes. Please do not actually use these coding practices in production code. Embrace clean code principles, not spaghetti code!
