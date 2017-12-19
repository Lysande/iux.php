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

      it("should contain Ok on good input", function () {
        $value = ["a" => 1, "b" => 2];
        $col = new Collection($value);

        assert(is_array($col->result()->unwrap()), "expected an array");
      });

      it("should contain Err on bad input", function () {
        $col = new Collection("not a collection");
        assert($col->result()->isErr(), "Expected Result->isErr");
      });
    });

    # Core API - ICollection
    describe("Core API", function () {
      /**
       * get($k)
       *
       * values();
       * keys();
       *
       * count();
       */

      describe("Collection::get(k)", function () {
        $collection = Collection::from([
          "a" => "foo",
          "b" => "bar",
          "c" => "baz"
        ]);

        it("Should retrieve a value from the collection", function () use($collection) {
          assert($collection->get("a")->unwrap() == "foo", "Expected 'foo'");
        });

        it("Should return Result::Ok if the pairing exists", function () use($collection) {
          assert($collection->get("a")->isOk(), "Expected result::Ok");
        });

        it("Should return Result::Err if it doesn't", function () use($collection){
          assert($collection->get("d")->isErr(), "Expected result::Err");
        });
      });

      describe("Collection::values()", function () {
        /**
         * Update this so it uses Sequences instead of regular arrays
         * for the return value.
         */
        it("Should contain an array with the values of the collection", function () {
          $values = Collection::from(["a" => "foo", "b" => "bar"])
          ->values()
          ->result()
          ->unwrap();

          assert(
            $values[0] == "foo" &&
            $values[1] == "bar" &&
            count($values) == 2,

            "Expected ['foo', 'bar']"
          );
        });

        it("Should return a Result::Ok if no values exist", function () {
          $empty = new Collection([]);
          assert($empty->values()->result()->isOk(), "Expected Result::Ok");
        });

        it("Should contain an empty array if no values exist", function () {
          $empty = new Collection([]);
          assert(
            is_array($empty->values()->result()->unwrap()) &&
            count($empty->values()->result()->unwrap()) == 0,

            "Expected []"
          );
        });
      });


      describe("Collection::keys()", function () {
        /**
         * Update this so it uses Sequences instead of regular arrays
         * for the return value.
         */
        it("Should contain an array with the keys of the collection", function () {
          $keys = Collection::from(["a" => "foo", "b" => "bar"])
          ->keys()
          ->result()
          ->unwrap();

          assert(
            $keys[0] == "a" &&
            $keys[1] == "b" &&
            count($keys) == 2,

            "Expected ['foo', 'bar']"
          );
        });

        it("Should return a Result::Ok if no keys exist", function () {
          $empty = new Collection([]);
          assert($empty->keys()->result()->isOk(), "Expected Result::Ok");
        });

        it("Should contain an empty array if no keys exist", function () {
          $empty = new Collection([]);
          assert(
            is_array($empty->keys()->result()->unwrap()) &&
            count($empty->keys()->result()->unwrap()) == 0,

            "Expected []"
          );
        });
      });
    });

    # Iterable
    describe("Iterable", function () {
      describe("Collection::Iterable::map", function () {
        it("Should transform the collection", function () {
          $squares = Collection::from([1, 2, 3])
          ->map(function ($n) { return n*n; });

          assert(
            $squares[0] == 1,
            $squares[1] == 4,
            $squares[2] == 9,

            "Expected [1, 2, 3] -> [1, 4, 9]"
          );
        });
      });
    });


  });
?>
