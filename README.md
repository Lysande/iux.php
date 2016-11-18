# IUX - Better collections for PHP

## About
Iux is a library that offers easy-to-use, predictable abstractions for arrays,
by wrapping the native collections in custom classes.

Iux offers:
* Predictable management through Dictionary, ArrayList and Sequence types
* (Kind of) Immutable collections - No side effects, and source collections
  are left unchanged
* Chainable transformations
* Error handling that prevents crashes as far as possible - Errors from
  anywhere in the chain will be carried through until the end, and thrown
  only when you unwrap your collection in the end

## Types

### Dictionary
The basic type - *`string`* keys, *`mixed`* values, with a basic API for transformations.

### ArrayList
Your basic kind of array: *`int`* keys, *`mixed`* values. At this point in time,
values are not type-bound. Any such functionality will likely be put into a higher
level TypedArrayList.

### Sequence
In essence an ArrayList that doesn't allow gaps in the keys. Keys are always predictable,
`0, 1, ... n`.

## Possible future additions

### Typed Collections
Typed versions of the Dictionary, ArrayList and Sequence, with type-checking on
methods that introduce new values, like `::wrap`, `::add`, `::map` etc. type-checking
will be made by supplying a *`callable`* that evaluates any values entered.

### Range
A range is a range, and has a very simple implementation. Essentially a typed
sequence that contains integers, with a special `::wrap` signature,
taking either one or two integers. `::wrap(n)` will create a range with `n` values,
exclusive ([0, 1, ... n-1]), and `::wrap(m, n)` will create a range from `m` to
`n`, inclusive ([m, m+1, ... n]).
