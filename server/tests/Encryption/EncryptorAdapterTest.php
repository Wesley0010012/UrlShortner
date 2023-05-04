<?php

namespace Tests\Encryption;

use \PHPUnit\Framework\TestCase;
use \Src\Data\Protocols\Cryptography\Encrypter;
use \Src\Infra\Encryption\EncryptorAdapter;

use \Bcrypt\Bcrypt;

class EncryptorAdapterTest extends TestCase {
  private Encrypter $sut;
  private BCrypt $bcrypt;

  public function setUp(): void {
    $this->sut = new EncryptorAdapter;
    $this->bcrypt = new Bcrypt;
  }

  public function testShouldReturnEncryptedText(): void {
    $result = $this->sut->encrypt("QualquerCoisa");
    $this->assertIsString($result);
    $this->assertEquals($this->bcrypt->verify("QualquerCoisa", $result), true);
  }

  public function testShouldReturnDecryptedText(): void {
    $result = $this->sut->encrypt("QualquerCoisa");
    $decrypted = $this->sut->decrypt($result);
  }
}