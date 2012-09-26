<?php
/**
 * Book controller, take care of the request that have anything to do with book.
 * @author rithychhen
 *
 */
class bookController extends mainController {
	/**
	 * User parent constructor.
	 */
	public function __construct() {
		parent::__construct ();
	}
	/**
	 * add book form. 
	 */
	public function index() {
		$this->load->view ( addBookForm );
	}
	
	/**
	 * 
	 */
	public function checkinBook() {
		$this->load->model ( book );
		$model = new bookModel ();
		$result = $model::display_out ();
		
		$vars ['result'] = $result;
		$this->load->view ( checkin, $vars );
	}
	public function checkinProcess() {
		$this->load->model ( book );
		$model = new bookModel ();
		if (isset ( $_POST ['check'] )) {
			
			$temp = array ();
			$tok = strtok ( $_POST ['check'], '/' );
			while ( $tok != false ) {
				$temp [] = $tok;
				$tok = strtok ( '/' );
			}
			$result = $model::check_in ( $temp [0], $temp [1] );
			if ($result) {
				$result = $model::display_out ();
				$display = '<p> Check in Successful </p>';
			}
		} else {
			$result = $model::display_out ();
			$display = '<p> please select a book </p>';
		}
		$vars ['result'] = $result;
		$vars ['display'] = $display;
		$this->load->view ( checkin, $vars );
	
	}
	public function checkout() {
		$this->load->model ( book );
		$model = new bookModel ();
		if (isset ( $_POST ['check'] )) {
			$temp = array ();
			$tok = strtok ( $_POST ['check'], '/' );
			while ( $tok != false ) {
				$temp [] = $tok;
				$tok = strtok ( '/' );
			}
			$result = $model::check_out ( $temp [0], $temp [1] );
		} else {
			$result = '<p> Please Select a book</p>';
		}
		
		$vars ['result'] = $result;
		$this->load->view ( searchBook, $vars );
	
	}
	
	public function addBook() {
		$this->load->model ( book );
		$model = new bookModel ();
		if ($_POST ['isbn'] == "" || $_POST ['author'] == "" || $_POST ['title'] == "" || $_POST ['year'] == "") {
			$vars ['message'] = 'Please complete the require fields';
		} else {
			echo $_POST ['isbn'];
			$flag = $model::addNewBook ( $_POST ['isbn'], $_POST ['author'], $_POST ['title'], $_POST ['year'] );
			if ($flag) {
				$vars ['message'] = 'A new book has been added <br /> <a href="../main"> Back to homepage';
			} else {
				$vars ['message'] = 'Isbn already exist, a new copy has been added <br /><a href="../main"> Back to homepage';
			}
		}
		$this->load->view ( addBookForm, $vars );
	
	}
}
?>