<?php

namespace Src\Presentation\Controllers;

use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Helpers\HttpHelpers;
use Src\Presentation\Protocols\HttpRequest;
use \Src\Presentation\Protocols\HttpResponse;
use \Src\Presentation\Protocols\UrlController as ProtocolsUrlController;

class UrlController implements ProtocolsUrlController {
  public function index(HttpRequest $request): HttpResponse {
    if(!$request->body['url'])
      return HttpHelpers::badRequest(new MissingParamError("url"));
  }
}