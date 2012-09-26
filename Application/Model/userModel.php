<?php
class userModel {
	private $db;
	private $database;
	public function __construct() {
		$this->db = new Database ();
		$this->database = $this->db->getDatabase ();
	}
	public function loginProcess($username, $password) {
		$query = "SELECT * FROM Username where Username='$username' and Password='$password'";
		$result = mysql_query ( $query );
		if (mysql_num_rows ( $result ) == 0) {
			return false;
		} else {
			$data = mysql_query ( "SELECT * From Username" );
			while ( ($row = mysql_fetch_array ( $data ) ) != FALSE) {
				if ($username == $row ['Username']) {
					$_SESSION ['Role'] = $row ['Role'];
					break;
				}
			}
			return true;
		}
	}
	public function addNewUser($lastname, $firstname, $address, $email, $abl, $zip, $username, $password, $role) {
		$query = "SELECT * FROM User WHERE LastName='$lastname' AND FirstName='$firstname'";
		$result = mysql_query ( $query );
		if (mysql_num_rows ( $result ) == 0) {
			mysql_query ( "INSERT INTO User (LastName, FirstName, Address, Email, Acct_balance, Zip)
 					VALUES ('$lastname', '$firstname', '$address', '$email', $abl, $zip)" );
			//insert into UserName,
			mysql_query ( "INSERT INTO Username(Username, Password, Role)
					VALUES ('$username', '$password', '$role')" );
			return true;
		} else {
			return false;
		}
	}
	
	public function deleteUser($id) {
		$current_user_id = Database::getCurrentUserId ( $_SESSION ['username'] );
		if ($id != $current_user_id) {
			//put all the book from this user back. 
			$result = mysql_query ( "SELECT * FROM Book_Status, Book_date WHERE Book_Status.isbn = Book_date.isbn
  			AND Book_Status.copy = Book_date.copy AND Book_date.user_id = $id" );
			$num = mysql_num_rows ( $result );
			if ($num != 0) {
				while ( ($row = mysql_fetch_array ( $result ) ) != FALSE){
					$status = $row ['status'];
					if ($status == "out") {
						$isbn = $row ['isbn'];
						$copy = $row ['copy'];
						mysql_query ( "UPDATE Book_Status SET status='in'
     					WHERE isbn='$isbn' AND copy='$copy'" );
					}
				}
			}
			
			mysql_query ( " DELETE FROM Username WHERE user_id = $id" );
			mysql_query ( " DELETE FROM Book_date WHERE user_id = $id" );
			mysql_query ( " DELETE FROM User WHERE user_id = $id" );
		}
	}
	
	public function checkOutYou() {
		$user_id = Database::getCurrentUserId ( $_SESSION ['username'] );
		$result = mysql_query ( "SELECT DISTINCT* FROM Book, Book_Status, Book_date WHERE Book.isbn = Book_Status.isbn 
			AND Book_Status.isbn = Book_date.isbn AND Book_Status.copy = Book_date.copy AND Book_date.user_id = $user_id" );
		$output = array ();
		if (mysql_num_rows ( $result ) != 0) {
			
			while ( ($row = mysql_fetch_array ( $result )) != FALSE ) {
				
				if ($row ['status'] == 'out') {
					$output [] = array ($row ['isbn'], $row ['author'], $row ['year'], $row ['copy'], $row ['due_date'] );
				}
			}
		}
		return $output;
	}
}