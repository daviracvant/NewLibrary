<?php

class searchController extends mainController {
	public function __construct() {
		parent::__construct ();
	}
	
	public function index() {
		$this->load->view ( searchPatron );
	}
	
	public function searchBook() {
		$this->load->view ( searchBook );
	}
	public function searchPatron() {
		
	}
	public function bookDisplay() {
		$this->load->model ( search );
		$model = new searchModel ();
		
		if ($_POST ['searchBook'] == "") {
			$result = $model::display_book ();
		} else {
			$result = $model::display_book ( $_POST ['searchBook'], $_POST ['type'] );
		}
		$vars ['result'] = $result;
		$this->load->view ( searchBook, $vars );
	}
	
	public function searchDisplay() {
		$this->load->model ( search );
		$model = new searchModel ();
		
		if ($_POST ['searchPatron'] == "") {
			$result = $model::display_patron ();
		} else {
			$result = $model::display_patron ( $_POST ['searchPatron'], $_POST ['type'] );
		}
		$vars ['result'] = $result;
		$this->load->view ( searchPatron, $vars );
	
	}
}
?>