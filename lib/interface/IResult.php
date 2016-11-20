<?php

interface IResult
{
  public static function Ok($value);
  public static function Err($value);

  public function isOk();
  public function isErr();

  public function unwrap();
}
