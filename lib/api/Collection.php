<?php

namespace iux\api;

use \iux\enums\Result as Result;

class Collection extends \iux implements \iux\interfaces\ICollection
{
  const ERR_NOT_AN_ARRAY = "The value given is not an array";
  const ERR_NO_PARAMETERS = "One or more parameters are missing";

  use \iux\traits\Iterable;

  function __construct($value)
  {
    parent::__construct($value, "is_array", self::ERR_NOT_AN_ARRAY);
  }

  /**
   * use default null values to keep PHP from throwing errors.
   * PHP errors are not chainable.
   */
  public function add($k = NULL, $v = NULL)
  {
    if ($this->value->isErr()) return $this->value;

    if (!isset($k) || !isset($v))
    {
      $this->value = Result::Err(self::ERR_NO_PARAMETERS);
    }
    else
    {
      $this->value = array_merge($this->value, [$k => $v]);
    }

    return new Collection($this->value);
  }

  public function remove($k)
  {

  }
}
