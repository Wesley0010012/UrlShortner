<?php

namespace Src\Presentation\Errors;

class MissingParamError extends \Error {
  public function __construct(string $param) {
    parent::__construct('Missing Param: '.$param);
    $this->message = 'MissingParamError';
  }
}