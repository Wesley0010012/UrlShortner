<?php

namespace Src\Presentation\Protocols;

interface EmailValidator {
  public function isValid(string $email): bool;
}