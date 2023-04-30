<?php

namespace Tests\Stubs\EmailValidatorStubs;

use Src\Validation\Protocols\EmailValidator;

class EmailValidatorStub implements EmailValidator {
  public function isValid(string $email): bool {
    return true;
  }
}