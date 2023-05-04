<?php

namespace Src\Infra\Encryption;

use \Bcrypt\Bcrypt;

use \Src\Data\Protocols\Cryptography\Encrypter;


class EncryptorAdapter implements Encrypter {
  private BCrypt $bcrypt;
  
  public function __construct() {
    $this->bcrypt = new Bcrypt;
  }

  public function encrypt(string $plaintext): string {
    $result = $this->bcrypt->encrypt($plaintext);
    return $result;
  }

  public function decrypt(string $cyphertext): string {
    // $result = $this->bcrypt->;
    return $result;
  }
}