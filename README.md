# 8fold Foldable

Foldable is a low-level, lighweight library to facilitate creating procedural
sequences and manipulate data types using
[fluent interfaces](https://en.wikipedia.org/wiki/Fluent_interface#PHP),
[pipelines](https://en.wikipedia.org/wiki/Pipeline_(software)), or both.

## Installation

```bash
composer require 8fold/php-foldable
```

## Usage

The primary concept and implementation is the Fold. The concept is available as
a `class`, `trait`, and `interface`. The Fold affords developers an entry and
exit methodology for crating fluent interfaces; as such, it's typical to extend
the Fold class and not use it directly.

The secondary concept and implementation is the pipeline via the Pipe `class`
and Filter `class`, `trait` and `interface`.

### Fold (Fluent)

The Foldable `interface` establishes a standard set of methods for constructing a generic wrapper. Pass in basic PHP types, class instances, and so on. The `fold` `method` is a static initializer and accepts any number of argument values. The first argument can be retrieved through the `main` `method` or the `args` `method` when passing `true`. You can then retrieve the result of any manipulation by using the `unfold` `method`.

The FoldableImp `trait` contains the default implementation for each method in the Foldable `interface`. Folding any number of arguments results in them being stored in the instance. The `main` `method` will return the first argument received (after an manipulations performed). The `args` `method` will return all the others (after any manipulations performed); passing `true` to the `method` will result in receiving all the arguments including the one you can retrieve from the `main` `method`.

The Fold `class` implements the Foldable `interface` and uses the FoldableImp `trait`. You can extend this class and overrid any of the `methods` as you see fit. In fact, that's usually the recommended way to go about things. If you would like to establish `typehints` for your implementation you should be able to implement the Foldable `interface` without the `trait` and add the typehints to the `methods`.

```php
class MyFoldable extends Fold
{
  public function unfold(): string
  {
  	$otherWords = $this->args();

  	return $this->main() .", ". $otherWords[1];
  }
}

print MyFoldable::fold("Hello", "World!")->unfold();
// output: Hello, World!
```

For creating a fluent interface, you can create other methods that either return the current instance or instantiates a new one (if you prefer pure immutability).

```php
class MyFoldable extends Fold
{
	public function append(string $string): MyFoldable
	{
		$this->main = $this->main() . $string;

		return $this;
		// return MyFoldable::fold($this->main);
	}
}

print MyFoldable::fold("Hello")->append(", World!")->unfold();
// output: Hello, World!
// note: We did not overwrite the unfold method.
```













The `fold()` static initializer (or named constructor) can take an infinite number of arguments. For the defulat implementation, the first argument is stored as `main` while the others are stored as an array called `args`. To help facilitate immutability, you can retrieve the arguments provided by calling the `args` method; you can also specify that you want the completely list, including main, by calling `args(true)`.

**Filters** are PHP classes implementing the `__invoke` magic method; thereby becoming more like a namespaced global function in the standard library.

```php
class Append extends Filter
{
	public function __invoke($using): string
	{
			if (is_a($using, Pipe::class)) {
					return $using->unfold() . $this->main;
			}
			return $using . $this->main;
	}
}

print Apply::append(", World!")->unfoldUsing("Hello");
// output: Hello, World!

class MyFoldable extends Fold
{
	public function append(string $string): MyFoldable
	{
		$this->main = Append::applyWith($string)->unfoldUsing($this->main);

		return $this;
	}
}

print MyFoldable::fold("Hello")->append(", World!")->unfold();
// output: Hello, World!
```

**Pipes** can be used to apply multiple filters in sequence from a starting point.

```php
class Prepend extends Filter
{
	public function __invoke(string $using): string
	{
			return Append::applyWith($using)->unfoldUsing($this->main);
	}
}

$result = Pipe::fold("World",
	Apply::prepend("Hello, "),
	Apply::append("!")
)->unfold();
// output: Hello, World!

// you can allow filters to take pipes as well
$result = Pipe::fold("World",
	Apply::prepend(
		Pipe::fold("ello",
			Apply::prepend("H"),
			Apply::append(","),
			Apply::append(" ")
		)
	),
	Apply::append("!")
)->unfold();
```

We also provide an assertion filter in the tests directory call `PerformantEqualsTestFilter`, which can be used to test equality and performance of `Foldables` and `Filters`.

```php
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

class TestCase extends PHPUnitTestCase
{
	/**
	* @test
	*/
	public function test_something()
	{
		AssertEquals::applyWith(
			"expected result",
			"expected type",
			0.4 // maximum milliseconds
		)->unfoldUsing(
			Pipe::fold("World",
				Apply::prepend(
					Pipe::fold("ello",
						Apply::prepend("H"),
						Apply::append(","),
						Apply::append(" ")
					)
				),
				Apply::append("!")
			)
		);
	}
}
```

The start time is start at initialization and stopped after unfolding the passed Foldable or assigning the passed value.

## Details

Primary goals are:

1. Allow for type-safety while giving you flexibility in what that means.
2. Speed. This is a low-level library meant for high-extensibility adding as little processing overhead as possible. Our baseline for performance tests (which is most of them) is 0.3 milliseconds. (If you know of ways to improve the speed, feel free to submit an issue or PR).
3. Anit-null. Whenever possible, we do not accept `null` as a required paramater and do avoid returning null whenever possible. We are not defensive with it; so, much of that responsbility is left to the user.

## Other

- [Versioning](https://github.com/8fold/php-foldable/blob/master/.github/VERSIONING.md)
- [Contributing](https://github.com/8fold/php-foldable/blob/master/.github/CONTRIBUTING.md)
- [Security Policy](https://github.com/8fold/php-foldable/blob/master/.github/SECURITY.md)
- [Code of Coduct](https://github.com/8fold/php-foldable/blob/master/.github/CODE_OF_CONDUCT.md)
- [Governance](https://github.com/8fold/php-foldable/blob/master/.github/GOVERNANCE.md)
