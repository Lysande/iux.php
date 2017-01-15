<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  use \iux\api\Collection as Collection;

  describe("iux\Collection", function () {
    $sample = ["a" => "foo", "b" => "bar"];

    # Sanity check - Initialization, Results etc.
    describe("Basics", function () {

      it("Should construct with a hash", function () {

      });

      it("... and with ::from", function () {

      });

      it("should contain Ok on good input", function () use($validator, $error) {
        $value = ["a" => 1, "b" => 2];
        $col = new Collection($value);

        assert(is_array($col->result()->unwrap()), "expected an array");
      });

      it("should contain Err on bad input", function () use($validator, $error) {
        $col = new Collection("not a collection");
        assert($col->result()->unwrap() instanceof Exception, "Expected an exception");
      });
    });

    # Core API - ICollection
    describe("Core API", function () {
      /**
       * set($k, $v);
       * get($k)
       * remove($k);
       *
       * values();
       * keys();
       *
       * count();
       *
       */

      $collection = Collection::from($sample);

      if("should increase the count when adding an item", function () {
          $count_before = $collection->count();
          $count_after = $collection->set("c", "baz")->count();
      });

    });

    # Iterable
    describe("Iterable", function () {

    });


  });
?>
