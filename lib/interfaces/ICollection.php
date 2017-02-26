<?php

  namespace iux\interfaces;

  /**
   * ICollection only defines non-mutating
   * properties/read-only properties.
   *
   * The only exposed method of setting
   * a value is through construction.
   *
   * This is to avoid conflict between
   * implementations - A Dictionary might expose
   * methods for arbitrarily setting a
   * key/value pair, but a Sequence
   * might only expose methods for pushing.
   */
  interface ICollection
  {
    public function get($key);

    public function values();
    public function keys();

    public function count();
  }
