<?php
  namespace iux\api;

  class Dictionary extends Collection
  {

    use \iux\traits\Iterable;

    function __construct($value)
    {
      parent::__construct($value);
    }

    public function add($k, $v)
    {

    }

    public function remove($k)
    {

    }
  }
