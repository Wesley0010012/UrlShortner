<?php

namespace Tests\Stubs\EmailValidatorStubs;

class FakeEmailValidatorStub extends EmailValidatorStub {
  public function isValid(string $email): bool {
    return false;
  }
}