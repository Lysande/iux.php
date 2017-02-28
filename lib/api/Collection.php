<?php

namespace iux\api;

use \iux\api\Result as Result;

class Collection extends \iux implements \iux\interfaces\ICollection
{
  use \iux\traits\Iterable;

  const ERR_NOT_A_COLLECTION = "The value given is not a collection";
  const ERR_NO_PARAMETERS = "One or more parameters are missing";
  const ERR_UNDEFINED_INDEX = "Undefined index";

  protected $error;
  protected function validator($value) { return is_array($value); }

  function __construct($value)
  {
    $this->error = self::ERR_NOT_A_COLLECTION;
    parent::__construct($value);
  }


  public function get($k)
  {
    if($this->result->isErr())
    {
      return new Collection($this->result);
    }

    $collection = $this->result->unwrap();

    if (array_key_exists($k, $collection))
    {
      return Result::Ok($collection[$k]);
    }

    return Result::Err(self::ERR_UNDEFINED_INDEX);
  }

  public function values() {
    if ($this->result->isErr())
    {
      return new Collection($this->result);
    }

    return new Collection(array_values($this->result->unwrap()));
  }

  public function keys()
  {
    if ($this->result->isErr())
    {
      return new Collection($this->result);
    }

    return new Collection(array_keys($this->result->unwrap()));
  }


}
