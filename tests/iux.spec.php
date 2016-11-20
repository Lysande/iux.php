<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  describe("iux", function () {

    describe("Constructor", function () {
      $validator = "is_array";
      $error = "Not an array";

      it("should contain a Result on creation", function () use($validator, $error) {
        $res = (new iux(1, $validator, $error))->get();
        assert($res instanceof \iux\enums\Result, "expected Result");
      });

      it("... and when using ::from", function () use($validator, $error) {
        $res = iux::from(1, $validator, $error)->get();
        assert($res instanceof \iux\enums\Result, "expected Result");
      });

      it("should contain Ok on good input", function () use($validator, $error) {
        $value = ["a" => 1, "b" => 2];
        $iux = new iux($value, $validator, $error);

        assert(is_array($iux->get()->unwrap()), "expected an array");
      });

      it("should contain Err on bad input", function () use($validator, $error) {
        $iux = new iux("not a iux", $validator, $error);
        assert($iux->get()->unwrap() instanceof Exception, "Expected an exception");
      });
    });
  });
?>
