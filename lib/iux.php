<?php

  use \iux\api\Result as Result;

class iux
{
  protected $result;
  protected $error;
  protected function validator($value) { return true; }

  function __construct($result)
  {
    if ($result instanceof Result)
    {
      $this->result = $result;
    }
    else if ($this->validator($result))
    {
      $this->result = Result::Ok($result);
    }
    else
    {
      $this->result = Result::Err($this->error);
    }

  }

  public function result()
  {
    return $this->result;
  }

  public static function from($result)
  {
    return new static($result);
  }
}
