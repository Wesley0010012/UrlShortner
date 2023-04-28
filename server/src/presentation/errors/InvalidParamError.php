<?php

namespace Src\Presentation\Errors;

class InvalidParamError extends \Error {
  public function __construct($param) {
    parent::__construct("Invalid Param: ".$param);
    $this->message = "Invalid Param Error";
  }
}