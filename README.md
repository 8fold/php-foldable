# 8fold Foldable

Foldable gives you `interfaces`, `traits`, and `classes` to facilitate easy creation of [fluent interfaces](https://en.wikipedia.org/wiki/Fluent_interface) and [pipe and filter](https://en.wikipedia.org/wiki/Pipeline_(software)) implementations.

The idea is to create the opening and closing and let you develop the points in between.

If you're looking to get up and running with minimal lift or learning curve decide whether you are wanting to do a more chain-based (fluent) or pipe-based approach.

If you're lookng for the chaining, extend the `Fold` class, add methods to the extension, make the static call to `fold()` (instantiate as usual), **do what you want to do**, then call `unfold()`. Just make sure during the "do what you want to do" bit that each method returns something you know about or expected - usually another Foldable.

Piping is a bit different, but simple, we hope.

1. Extend the `Filter` class.
2. Write an `__invoke` method in the `Filter` accepting one, type-safeable argument, which is either the initial value or the output of the previous filter.
3. If you want to accept arguments, write a `__construct` method that accepts those arguments.
4. Use the `Pipe` class to start with your initial payload, followed by any number of `Filters`.
5. Call the `unfold()` method just like you would in a fluent interface.

## Installation

```bash
composer require 8fold/php-foldable
```

## Usage

Our [tests](https://github.com/8fold/php-foldable/tree/master/tests) and are a good place to start. If you have any questions, please do post an issue.

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
