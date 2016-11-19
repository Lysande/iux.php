<?php

namespace iux\interfaces;

interface IResult
{
  public static function Ok($value);
  public static function Err($value);

  public function unwrap();
}
