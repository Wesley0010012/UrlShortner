<?php

namespace Src\Presentation\Protocols;

use \Src\Presentation\Protocols\HttpResponse;

interface UrlController {
  public function index(HttpRequest $request): HttpResponse;
}