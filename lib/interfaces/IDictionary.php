<?php

  namespace iux\interfaces;

  interface IDictionary
  {
    public function set($key, $value);
    public function get($key);
    public function remove($key);
    
    public function count();
  }
