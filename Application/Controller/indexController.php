<?php

class indexController extends mainController {
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * 
	 */
	public function index() {
		if (! isset ( $_SESSION ['username'] )) {
			$this->load->view ( login );
		} else {
			$this->load->view ( home );
		}
	}
}
?>