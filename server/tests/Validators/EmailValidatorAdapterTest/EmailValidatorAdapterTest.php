<?php

namespace Tests\Validators\EmailValidatorAdapterTest;

use \PHPUnit\Framework\TestCase;
use \Src\Infra\Validators\EmailValidatorAdapter;
use \Src\Validation\Protocols\EmailValidator;

class EmailValidatorAdapterTest extends TestCase {
  private EmailValidator $emailValidator;

  public function setUp(): void {
    $this->emailValidator = new EmailValidatorAdapter;
  }

  public function testShouldReturnFalseIfNoEmailIsProvided(): void {
    $result = $this->emailValidator->isValid("fake_email");

    $this->assertEquals(false, $result);
  }

  public function testShouldReturnTrueIfCorrectlyEmailIsProvided(): void {
    $result = $this->emailValidator->isValid("correct_email@emaill.com");

    $this->assertEquals(true, $result);
  }
}