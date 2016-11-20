<?php

namespace iux\enums;

class Result implements \iux\interfaces\IResult
{

  protected $value;

  function __construct($value)
  {
    $this->value = $value;
  }


  public function isOk()
  {
    return !$this->isErr();
  }

  public function isErr()
  {
    return $this->value instanceof \Exception;
  }

  public function unwrap()
  {
    return $this->value;
  }

  public static function Ok($value)
  {
    return new Result($value);
  }

  public static function Err($error)
  {
    $exception = new \Exception($error);
    return new Result($exception);
  }
}
