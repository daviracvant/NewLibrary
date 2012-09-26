<?php
class searchModel {
	private $db;
	private $database;
	public function __construct() {
		$this->db = new Database ();
		$this->database = $this->db->getDatabase ();
	}
	
	public function display_patron($keyword, $type) {
		if (isset ( $keyword ) && isset ( $type )) {
			$result = self::getPatronQuery ( $keyword, $type );
		} else {
			$result = mysql_query ( "SELECT * FROM User, Username WHERE User.user_id = Username.user_id" );
		}
		$output = array ();
		if (mysql_num_rows ( $result ) != 0) {
			
			while ( ($row = mysql_fetch_array ( $result )) != FALSE ) {
				
				$output [] = array ($row ['user_id'], $row ['LastName'], $row ['FirstName'], $row ['Username'], $row ['Acct_balance'] );
			
			}
		} else {
			$output = '<p>No Result Found</p>';
		}
		return $output;
	}
	
	private function getPatronQuery($keyword, $type) {
		if ($type == 'lastname') {
			$result = mysql_query ( "SELECT * FROM User, Username WHERE User.user_id = Username.user_id 
 	 		AND User.LastName LIKE '%$keyword%'" );
		} else if ($type == 'firstname') {
			$result = mysql_query ( "SELECT * FROM User, Username WHERE User.user_id = Username.user_id 
  			AND User.FirstName LIKE '%$keyword%'" );
		} else {
			$result = mysql_query ( "SELECT * FROM User, Username WHERE User.user_id = Username.user_id 
  			AND Username.Username LIKE '%$keyword%'" );
		}
		return $result;
	}
	
	public function display_book($keyword, $type) {
		if (isset ( $keyword ) && isset ( $type )) {
			$result = self::getBookQuery ( $keyword, $type );
		} else {
			$result = mysql_query ( "SELECT * FROM Book, Book_Status WHERE Book.isbn = Book_Status.isbn" );
		}
		
		$output = array ();
		if (mysql_num_rows ( $result ) != 0) {
			
			while ( ($row = mysql_fetch_array ( $result )) != FALSE ) {
				if ($row ['status'] == 'in') {
					$output [] = array ($row ['isbn'], $row ['copy'], $row ['author'], $row ['title'], $row ['year'], $row ['status'] );
				}
			}
		}
		return $output;
	}
	
	private function getBookQuery($keyword, $type) {
		
		if ($type == 'isbn') { //isbn
			$result = mysql_query ( "SELECT * FROM Book, Book_Status WHERE Book.isbn = Book_Status.isbn AND Book.isbn LIKE '%$keyword%'" );
		} else if ($type == 'author') { //author
			$result = mysql_query ( "SELECT * FROM Book, Book_Status WHERE Book.isbn = Book_Status.isbn AND Book.author LIKE '%$keyword%'" );
		} else if ($type == 'title') { //title
			$result = mysql_query ( "SELECT * FROM Book, Book_Status WHERE Book.isbn = Book_Status.isbn AND Book.title LIKE '%$keyword%'" );
		} else { //year
			$result = mysql_query ( "SELECT * FROM Book, Book_Status WHERE Book.isbn = Book_Status.isbn AND Book.year LIKE'%$keyword%'" );
		}
		return $result;
	}
}
?>