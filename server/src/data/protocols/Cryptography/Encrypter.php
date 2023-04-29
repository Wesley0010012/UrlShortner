<?php

namespace Src\Data\Cryptography;

interface Encrypter {
  public function encrypt(string $plaintext): string;
}