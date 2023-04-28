<?php

namespace Src\Presentation\Controllers\UrlController;

use Src\Presentation\Errors\InvalidParamError;
use Src\Presentation\Errors\MissingParamError;
use Src\Presentation\Helpers\HttpHelpers;
use Src\Presentation\Protocols\EmailValidator as ProtocolsEmailValidator;
use Src\Presentation\Protocols\HttpRequest;
use Src\Presentation\Protocols\HttpResponse;
use Src\Presentation\Protocols\UrlController as ProtocolsUrlController;

class UrlController implements ProtocolsUrlController {
  private readonly ProtocolsEmailValidator $emailValidator;
  
  public function __construct(ProtocolsEmailValidator $emailValidator)
  {
    $this->emailValidator = $emailValidator;
  }

  public function index(HttpRequest $request): HttpResponse {
    $params = array('email', 'url');

    foreach($params as $param)
      if(!$request->body[$param])
        return HttpHelpers::badRequest(new MissingParamError($param));

    if(!$this->emailValidator->isValid($request->body['email']))
      return HttpHelpers::badRequest(new InvalidParamError('email'));
  }
}