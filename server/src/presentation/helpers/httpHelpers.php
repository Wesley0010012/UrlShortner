<?php

namespace Src\Presentation\Helpers;

use Error;
use Src\Presentation\Protocols\HttpResponse;

class HttpHelpers {
  private static HttpResponse $response;

  private static function generator() {
    self::$response = new HttpResponse;
  }

  public static function badRequest(Error $error): HttpResponse {
    self::generator();

    self::$response->statusCode = 400;
    self::$response->body = $error;

    return self::$response;
  }

  public static function success(mixed $message): HttpResponse {
    self::generator();

    self::$response->statusCode = 200;
    self::$response->body = $message;

    return self::$response;
  }
}