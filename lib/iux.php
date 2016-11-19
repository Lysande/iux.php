<?php

class iux
{
  protected $value;

  function __construct($value)
  {
    $this->value = \iux\enums\Result::Ok($value);
  }

  public function get()
  {
    return $this->value;
  }
}
