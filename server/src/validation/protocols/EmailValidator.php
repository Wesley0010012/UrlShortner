<?php

namespace Src\Validation\Protocols;

interface EmailValidator {
  public function isValid(string $email): bool;
}