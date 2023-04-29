<?php

namespace Src\Infra\Validators;

use \Src\Validation\Protocols\EmailValidator as EmailValidatorProtocol;
use \Egulias\EmailValidator\EmailValidator;
use \Egulias\EmailValidator\Validation\RFCValidation;

class EmailValidatorAdapter implements EmailValidatorProtocol {
  public function isValid(string $email): bool {
    $validator = new EmailValidator;
    
    if(!$validator->isValid($email, new RFCValidation))
      return false;

    return true;
  }
}