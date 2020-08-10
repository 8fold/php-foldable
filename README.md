# 8fold Foldable

Foldable is made of three components:

1. The Foldable `interface` establishes entry and exit points for developing [fluent interfaces](https://martinfowler.com/bliki/FluentInterface.html) and [pipeline patterns](https://en.wikipedia.org/wiki/Pipeline_(software)).
2. The FoldaImp `trait` is a default implementation allowing for the passing in of an initial value and retrieving that value.
3. The Fold `class` implements Foldable and uses FoldableImp along with static implementations for type-safe folding of common [PHP types](https://www.php.net/manual/en/language.types.intro.php).

## Installation

```bash
composer require 8fold/php-foldable
```

## Usage

See also:

- [Interface only class](https://github.com/8fold/php-foldable/blob/master/tests/TestClasses/TestInterfaceOnly.php); essentially the implementation of the [FoldableImp trait](https://github.com/8fold/php-foldable/blob/master/src/FoldableImp.php)
- [Traits only class](https://github.com/8fold/php-foldable/blob/master/tests/TestClasses/TestTraitOnly.php); essentially the imlementation of the [Fold class](https://github.com/8fold/php-foldable/blob/master/src/Fold.php)
- [TestExtension class](https://github.com/8fold/php-foldable/blob/master/tests/TestClasses/TestExtension.php) demonstrating how to extend the library.

## Details

Primary goals are:

1. Allow for type-safety while given you flexibility in what that means.
2. Speed. This is a low-level library meant for high-extensibility adding as little processing overhead as possible. Our baseline for performance tests (which is most of them) is 0.3 milliseconds. (If you know of ways to improve the speed, feel free to submit an issue or PR).

## Other

- [Versioning](https://github.com/8fold/php-foldable/blob/master/.github/VERSIONING.md)
- [Contributing](https://github.com/8fold/php-foldable/blob/master/.github/CONTRIBUTING.md)
- [Security Policy](https://github.com/8fold/php-foldable/blob/master/.github/SECURITY.md)
- [Code of Coduct](https://github.com/8fold/php-foldable/blob/master/.github/CODE_OF_CONDUCT.md)
- [Governance](https://github.com/8fold/php-foldable/blob/master/.github/GOVERNANCE.md)
