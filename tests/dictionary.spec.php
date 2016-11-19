<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  describe("iux::Dictionary", function () {
    /** Basics - Tests for determining Result handling and
      * error carry-over
      */
    describe("::get", function () {
      it("should contain a Result on creation", function () {
        $res = (new \iux\api\Dictionary(1))->get();
        assert($res instanceof \iux\enums\Result, "expected Result");
      });

      it("should require a key/value structure on creation", function () {
        $bad_input_1 = 1;
        $bad_input_2 = "foobar";
        $good_input_1 = ["a", "b", "c"];
        $good_input_2 =
        [
          "a" => 1,
          "b" => 2,
          "c" => 3
        ];

        assert(false, "should return Err when given bad input");

      });

    });
  });
?>
