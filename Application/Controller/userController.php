<?php
class userController extends mainController {
	public function __construct() {
		parent::__construct ();
	}
	
	public function index() {
		$this->load->view ( addForm );
	}
	
	public function logout() {
		unset ( $_SESSION ['username'] );
		$this->load->view ( logout );
	}
	
	public function login() {
		$this->load->model ( user );
		$model = new userModel ();
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		if ($model::loginProcess ( $username, $password )) {
			$_SESSION ['username'] = $username;
			$this->load->view ( home );
		} else {
			$this->load->view ( loginFail );
		}
	}
	
	public function accountInfo() {
		$this->load->model ( user );
		$model = new userModel ();
		$result = $model::checkOutYou ();
		$vars ['result'] = $result;
		$this->load->view ( account, $vars );
	}
	public function removeUser() {
		$this->load->model ( user );
		$model = new userModel ();
		$model::deleteUser ( $_POST ['check'] );
		$vars ['result'] = 'Remove Successful';
		$this->load->view ( searchPatron, $vars );
	
	}
	public function addUser() {
		$this->load->model ( user );
		$model = new userModel ();
		if (! ($_POST ['password'] == $_POST ['confirm_password'])) {
			$vars ['message'] = 'Re-enter your password twice';
		
		} else if ($_POST ['address'] == "" || $_POST ['firstname'] == "" || $_POST ['lastname'] == "" || $_POST ['username'] == "" || $_POST [zip] == "") {
			$vars ['message'] = 'Please complete the require fields';
		} else {
			$flag = $model::addNewUser ( $_POST ['lastname'], $_POST ['firstname'], $_POST ['address'], $_POST ['email'], 0, $_POST ['zip'], $_POST ['username'], $_POST ['password'], $_POST ['role'] );
			if ($flag) {
				$vars ['message'] = 'User has been created <br /> <a href ="../main"> Back to Homepage </a>';
			}
		}
		$this->load->view ( addForm, $vars );
	}
	
}