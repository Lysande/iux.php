<?php

class iux
{
  protected $value;

  /**
    * Should constructor oarams have internal error handling?
  */
  function __construct($value, $validator, $error)
  {
    if ($validator($value))
    {
      $this->value = \iux\enums\Result::Ok($value);
    }
    else
    {
      $this->value = \iux\enums\Result::Err($error);
    }

  }

  public function get()
  {
    return $this->value;
  }

  static public function from($value, $validator, $error)
  {
    return new static($value, $validator, $error);
  }
}
