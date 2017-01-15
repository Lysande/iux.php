<?php

class iux
{
  protected $result;
  protected static $error;

  /**
    * Should constructor oarams have internal error handling?
  */
  function __construct($result)
  {
    if (self::validator($result))
    {
      $this->result = \iux\api\Result::Ok($result);
    }
    else
    {
      $this->result = \iux\api\Result::Err(self::error);
    }

  }

  protected static function validator($value) { return true; }

  public function result()
  {
    return $this->result;
  }

  public static function from($result)
  {
    $validator = function ($value)
    {
      return self::validator($value);
    };
    return new static($result, $validator, self::$error);
  }
}
