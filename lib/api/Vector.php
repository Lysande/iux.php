<?php

  namespace iux\api;

  use \iux\api\Result as Result;
  use \iux\interfaces\IList as IList;

  use \iux\traits\Iterable as Iterable;

  class Vector extends \iux implements IList
  {
    use Iterable;

    const ERR_NOT_A_LIST = "Value is not a list. Value must be an array with numeric keys.";

    protected static $error = self::ERR_NOT_A_LIST;

    protected static function validator($value) {
      $number_keys = array_filter(array_keys($value), "is_int");
      return is_array($value) && count($number_keys) == count($value);
    }
    /**
     * Rules are that $value must be an arrau,
     * and that array must be numerically-indexed only.
     */

    function __construct($value)
    {
      parent::__construct($value);
    }

    public function head()
    {
      return $this;
    }
    public function tail()
    {
      return $this;
    }

    public function push($value)
    {
      return $this;
    }
    public function pop($value)
    {
      return $this;
    }
    public function shift()
    {
      return $this;
    }
    public function unshift($value)
    {
      return $this;
    }

    public function concat($list)
    {
      return $this;
    }

    public function reverse()
    {
      return $this;
    }
    public function shuffle()
    {
      return $this;
    }

    public function length()
    {
      if ($this->result()->isErr())
      {
        throw $this->result();
      }

      return count($this->result()->unwrap());
    }

    public static function from($value)
    {
      return parent::from($value);
    }
  }
