<?php

namespace Tests\Controllers\UrlControllerTest;

use \PHPUnit\Framework\TestCase;
use \Src\Presentation\Controllers\UrlController\UrlController;
use \Src\Presentation\Errors\InvalidParamError;
use \Src\Presentation\Errors\MissingParamError;
use \Src\Validation\Protocols\EmailValidator;
use \Src\Presentation\Protocols\HttpRequest;
use \Src\Presentation\Protocols\UrlController as UrlControllerProtocol;
use \Tests\Stubs\EmailValidatorStubs\FakeEmailValidatorStub;
use \Tests\Stubs\EmailValidatorStubs\EmailValidatorStub;

class UrlControllerTest extends TestCase {
  private UrlControllerProtocol $sut;
  private EmailValidator $emailValidator;

  public function setUp(): void {
    $this->emailValidator = new FakeEmailValidatorStub;
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

  public function testShouldReturn400IfInvalidEmailIsProvided(): void {
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

  public function testShouldReturn200IfAllIsCorrectlyProvided(): void {
    $this->emailValidator = new EmailValidatorStub;
    $this->sut = new UrlController($this->emailValidator);

    $request = new HttpRequest;
    $request->body = array(
      'url' => "http://url.com",
      'email' => "email@email.com"
    );

    $response = $this->sut->index($request);
    $this->assertEquals(200, $response->statusCode);
  }
}