<?php

namespace Src\Data\Protocols\Cryptography;

interface Encrypter {
  public function encrypt(string $plaintext): string;
  public function decrypt(string $cyphertext): string;
}