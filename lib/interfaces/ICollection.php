<?php

  namespace iux\interfaces;

  interface ICollection
  {
    public function add($k, $v);
    public function remove($k);
  }
