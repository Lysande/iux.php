<?php

  namespace iux\interfaces;

  interface IList
  {
    public function head();
    public function tail();

    public function push($value);
    public function pop($value);
    public function shift();
    public function unshift($value);
    
    public function concat($list);

    public function reverse();
    public function shuffle();

    public function length();
  }
