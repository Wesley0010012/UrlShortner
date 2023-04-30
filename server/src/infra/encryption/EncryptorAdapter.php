<?php

namespace Src\Infra\Encryption;

use \Src\Data\Cryptography\Encrypter;

class EncryptorAdapter implements Encrypter {
  public function encrypt(string $plaintext): string {
    $result = uniqid($plaintext);
    return $result;
  }
}