<?php

  namespace iux\traits;

  trait Iterable
  {
    public function map($fn)
    {
      if ($this->result->isErr())
      {
        return new Collection($this->result);
      }

      $class = get_class($this);

      return new $class(
        array_map($fn, $this->result->unwrap())
      );
    }

    public function filter($fn)
    {
      /**
       * Använd inbyggd filter men! behöver ta hänsyn till
       * om nycklar ska användas och bygga workarounds för det.
       */
    }

    public function reduce($fn)
    {

    }

    public function each($fn)
    {

    }
  }
