<?php

use \PHPUnit\Framework\TestCase;
use \Src\Presentation\Controllers\UrlController;
use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Protocols\HttpRequest;
use \Src\Presentation\Protocols\UrlController as UrlControllerProtocol;

class UrlControllerTest extends TestCase {
  public UrlControllerProtocol $sut;

  public function setUp(): void {
    $this->sut = new UrlController;
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
}