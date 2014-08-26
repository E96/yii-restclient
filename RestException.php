<?php
// vim: sw=4:ts=4:noet:sta:

class RestException extends Exception {
	public $response;
	public $httpCode;

	public function __construct($msg, $httpCode, $response = null) {
		$this->message = $msg;
		$this->response = $response;
		$this->httpCode = $httpCode;
	}
}
