<?php

namespace Tests\Stubs\EncrypterStubs;

use Src\Data\Protocols\Cryptography\Encrypter;

class EncrypterStub implements Encrypter {
  public function encrypt(string $plaintext): string {
    return $plaintext;
  }

  public function decrypt(string $cyphertext): string {
    return $cyphertext;
  }
}