<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  describe("iux", function () {

    describe("Basics", function () {
      $validator = "is_array";
      $error = "Not an array";

      it("should contain a Result on creation", function () use($validator, $error) {
        $res = (new iux(1, $validator, $error))->result();
        assert($res instanceof \iux\api\Result, "expected Result");
      });

      it("... and when using ::from", function () use($validator, $error) {
        $res = iux::from(1, $validator, $error)->result();
        assert($res instanceof \iux\api\Result, "expected Result");
      });

      it("should contain Ok on good input", function () use($validator, $error) {
        $value = ["a" => 1, "b" => 2];
        $iux = new iux($value, $validator, $error);

        assert(is_array($iux->result()->unwrap()), "expected an array");
      });
    });
  });
?>
