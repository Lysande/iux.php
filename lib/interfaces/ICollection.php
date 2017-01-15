<?php

  namespace iux\interfaces;

  interface ICollection
  {
    public function add($k, $v);
    public function remove($k);

    public function values();
    public function keys();

    public function count();
  }
