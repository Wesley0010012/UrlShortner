<?php

use \PHPUnit\Framework\TestCase;
use \Src\Presentation\Controllers\UrlController;
use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Protocols\HttpRequest;
use \Src\Presentation\Protocols\UrlController as UrlControllerProtocol;

class UrlControllerTest extends TestCase {
  public UrlControllerProtocol $sut;

  public function testShouldReturn400IfNoUrlIsProvided() {
    $this->sut = new UrlController;

    $error = new MissingParamError("url");
    $request = new HttpRequest;
    $request->body = array(
      "url" => "",
      "email" => "henryk"
    );
    $response = $this->sut->index($request);

    $this->assertEquals(400, $response->statusCode);
    $this->assertEquals($error->getMessage(), $response->body->getMessage());
  }
}