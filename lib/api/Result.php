<?php

namespace iux\api;

class Result implements \iux\interfaces\IResult
{
/**
 * Add support for endless wrapping, i.e.
 * Result::Ok(
 *  Result::Ok(
 *    Result::Err("Some err")
 *  )
 * )->unwrap() returns the innermost Exception, not another result.
 */
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
    if (!($error instanceof \Exception))
    {
      $error = new \Exception($error);
    }

    return new Result($error);
  }
}
