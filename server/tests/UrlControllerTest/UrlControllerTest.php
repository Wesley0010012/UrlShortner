<?php

use \PHPUnit\Framework\TestCase;
use \Src\Presentation\Controllers\UrlController\UrlController;
use Src\Presentation\Errors\InvalidParamError;
use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Protocols\EmailValidator;
use Src\Presentation\Protocols\HttpRequest;
use \Src\Presentation\Protocols\UrlController as UrlControllerProtocol;


class EmailValidatorStub implements EmailValidator {
  public function isValid(string $email): bool {
    return true;
  }
}

class UrlControllerTest extends TestCase {
  private UrlControllerProtocol $sut;
  private EmailValidator $emailValidator;

  public function setUp(): void {
    $this->emailValidator = new EmailValidatorStub;
    $this->sut = new UrlController($this->emailValidator);
  }

  public function testShouldReturn400IfNoUrlIsProvided(): void {
    $error = new MissingParamError("url");
    $request = new HttpRequest;
    $request->body = array(
      "url" => "",
      "email" => "henryk@email.com"
    );
    $response = $this->sut->index($request);

    $this->assertEquals(400, $response->statusCode);
    $this->assertEquals($error->getMessage(), $response->body->getMessage());
  }

  public function testShouldReturn400IfNoUrlEmailIsProvided(): void {
    $error = new MissingParamError("url");
    $request = new HttpRequest;
    $request->body = array(
      "url" => "http://url.com",
      "email" => ""
    );
    $response = $this->sut->index($request);

    $this->assertEquals(400, $response->statusCode);
    $this->assertEquals($error->getMessage(), $response->body->getMessage());
  }

  public function shouldReturn400IfInvalidEmailIsProvided(): void {
    $error = new InvalidParamError('email');
    $request = new HttpRequest;
    $request->body = array(
      "url" => "http://url.com",
      "email" => "fakeemail@email.com"
    );
    $response = $this->sut->index($request);

    $this->assertEquals(400, $response->statusCode);
    $this->assertEquals($error->getMessage(), $response->body->getMessage());
  }
}