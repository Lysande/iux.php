<?php
  // Include index.php, which sets up our autoloader.
  include(getcwd() . "/index.php");

  use \iux\api\Result as Result;

  describe("iux::enums::Result", function () {

    describe("::Ok", function () {
      it("should be instanceof Result", function () {
        $ok = Result::Ok(1);

        assert($ok instanceof Result, "expected Result");
      });


      it("should report `true` through isOk", function () {
        $ok = Result::Ok(1);
        assert($ok->isOk(), "expected `true`");
      });
    });

    describe("::Err", function () {
      it("should be instanceof Result", function () {
        $err = Result::Err("An error message");
        assert($err instanceof Result, "expected Result");
      });

      it("should report `true` through isErr", function () {
        $err = Result::Err("An error message");
        assert($err->isErr(), "expected `true`");
      });
    });

    describe("Ok::unwrap", function () {
      it("should return the contained value", function () {
        $ok = Result::Ok(1);
        $value = $ok->unwrap();
        assert($value == 1, "expected value");
      });
    });

    describe("Err::unwrap", function () {
      it("should return an exception", function () {
        $err = Result::Err("An error");
        $value = $err->unwrap();
        assert($value instanceof \Exception, "expected thrown error");
      });
    });
  });
?>
