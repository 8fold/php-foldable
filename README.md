# 8fold Foldable

Foldable is made of three components:

1. The Foldable `interface` establishes entry and exit points for developing [fluent interfaces](https://martinfowler.com/bliki/FluentInterface.html) and [pipeline patterns](https://en.wikipedia.org/wiki/Pipeline_(software)).
2. The FoldaImp `trait` is a default implementation allowing for the passing in of an initial value and retrieving that value.
3. The Fold `class` implements Foldable and uses FoldableImp along with static implementations for type-safe folding of common [PHP types](https://www.php.net/manual/en/language.types.intro.php).

## Installation

{how does one install the product}

## Usage

{brief example of how to use the product}

## Details

Primary goals are:

1. Allow for type-safety while given you flexibility in what that means.
2. Speed. This is a low-level library meant for high-extensibility adding as little processing overhead as possible. Our baseline for performance tests (which is most of them) is 0.3 milliseconds. (If you know of ways to improve the speed, feel free to submit an issue or PR).

## Other

{links or descriptions or license, versioning, and governance}
