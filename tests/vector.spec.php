<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  use \iux\api\Vector as Vector;

  describe("iux\Vector", function () {

    # Sanity check - Initialization, Results etc.
    describe("Basics", function () {

      it("Should only construct with an array", function () {
        $vec0  = (new Vector([1, 2, 3]))->result();
        $vec1 = (new Vector(["a", "b", "c"]))->result();
        $vec2 = (new Vector([1 => "a", 2 => "b"]))->result();

        $vec3 = (new Vector(["a" => "foo", "b" => "bar"]))->result();

        assert($vec0->isOk(), "with numeric array");
        assert($vec1->isOk(), "with string array");
        assert($vec2->isOk(), "with numeric-key hash");
        assert($vec3->isErr(), "not with a hash");
      });

      it("... and with ::from", function () {
        $vec0 = Vector::from([1, 2, 3])->result();
        $vec1 = Vector::from(["a", "b", "c"])->result();
        $vec2 = Vector::from([1 => "a", 2 => "b"])->result();

        $vec3 = Vector::from(["a" => "foo", "b" => "bar"])->result();

        assert($vec0->isOk(), "with numeric array");
        assert($vec1->isOk(), "with string array");
        assert($vec2->isOk(), "with numeric-key hash");
        assert($vec3->isErr(), "not with a hash");
      });
    });

    # Core API - IList
    describe("Core API", function () {
      describe("IList::length", function () {
        it("should return the number of items in the list", function () {
          assert(Vector::from(["a", "b", "c"])->length() == 3, "length of [a, b, c] is 3");
        });
      });
      describe("IList::pop", function () {
        it("should return the last record of the list", function () {
          $value = Vector::from(["a", "b"])
          ->pop()
          ->result()
          ->unwrap();

          assert($value == "b", "value of [a, b]->pop() is b");
        });
      });
      describe("IList::push", function () {
        it("should push a value to the end of the list", function () {
          $list = Vector::from(["a", "b"])->push("c");

          $value = $list->pop()->result()->unwrap();
          assert($value == "c", "value of [a, b]->push(c)->pop() is c");
          assert($list->length() == 3, "the length after pushing is 3");
        });
      });

      describe("IList::shift", function () {
        it("should return the first record of the list", function () {
          $value = Vector::from(["a", "b"])
          ->shift()
          ->result()
          ->unwrap();

          assert($value == "a", "value of [a, b]->pop() is a");
        });
      });
      describe("IList::unshift", function () {
        it("should push a value to the beginning of the list", function () {
          $list = Vector::from(["a", "b"])->unshift("c");

          $value = $list->shift()->result()->unwrap();
          assert($value == "c", "value of [a, b]->unshift(c)->shift() is c");
          assert($list->length() == 3, "the length after pushing is 3");
        });
      });
      describe("IList::concat", function () {
        it("Should concatenate two lists", function () {
          // Should it also work with a  result and/or a List?
          // Anything that implents IList, is an array or is a result?

          $vec0 = Vector::from([1, 2])->concat([3, 4]);

          assert($vec0->length() == 4, "Length of [1, 2] ++ [3, 4] is 4");
        });
      });

      describe("IList::head", function () {
        it("Should return the first result", function () {

        });
      });
      describe("IList::tail", function () {
        it("Should return everything but the first result", function () {

        });
      });
      describe("IList::reverse", function () {
        it("Should return the list in reverse order", function () {
          $value = Vector::from([1, 2])
            ->reverse()
            ->shift()
            ->result()
            ->unwrap();

          assert($value == 2, "First value of [1, 2]->reverse() is 2");
        });
      });
      describe("IList::shuffle", function () {
        it("should shuffle the list", function () {
          // How do you test for this?
        });
      });
    });
  });
?>
