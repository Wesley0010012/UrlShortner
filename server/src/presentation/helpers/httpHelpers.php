<?php

namespace Src\Presentation\Helpers;

use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Protocols\HttpResponse;

class HttpHelpers {
  private static HttpResponse $response;

  private static function generator() {
    self::$response = new HttpResponse;
  }

  public static function badRequest(MissingParamError $error): HttpResponse {
    self::generator();

    self::$response->statusCode = 400;
    self::$response->body = $error;

    return self::$response;
  }
}