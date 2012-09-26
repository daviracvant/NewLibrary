<?php
/**
 * Request Class: create a request. 
 * @author rithychhen
 * @version 2.
 */
class Request {
	/**
	 * a request controller.
	 */
	private $controller;
	/**
	 * a request method.
	 */
	private $method;
	/**
	 * request argument.
	 */
	private $arguments;
	
	/**
	 * Construct a request object, with the request controller, method and argument.
	 */
	public function __construct() {
		//grab the request url.
		$request_uri = $_SERVER ['REQUEST_URI'];
		$parts = array ();
		//string tok to get the method and argument. 
		$tok = strtok ( $request_uri, "/" );
		while ( $tok != false ) {
			$parts [] = $tok;
			$tok = strtok ( "/" );
		}
		if (! empty ( $parts )) { //main/method
			$this->controller = $parts [0];
			$this->method = $parts [1];
			$this->arguments = $parts [2];
		} else {
			$this->controller = 'index';
			$this->method = 'index';
		}
	}
	public function setController($controller) {
		$this->controller = $controller;
	}
	public function setMethod($method) {
		$this->method = $method;
	}
	public function setArgument($arg) {
		$this->arguments = $arg;
	}
	public function getController() {
		return $this->controller;
	}
	public function getMethod() {
		return $this->method;
	}
	public function getArgument() {
		return $this->arguments;
	}
}
?>
