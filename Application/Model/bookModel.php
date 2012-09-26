<?php
class bookModel {
	private $db;
	private $database;
	public function __construct() {
		$this->db = new Database ();
		$this->database = $this->db->getDatabase ();
	
	}
	
	public function check_in($isbn, $copy) {
		//update the book status.
		mysql_query ( "UPDATE Book_Status SET status='in' WHERE isbn='$isbn' AND copy='$copy'" );
		//remove the date.
		mysql_query ( "DELETE FROM Book_date WHERE isbn = '$isbn' AND copy ='$copy'" );
		return true;
	}
	
	public function check_out($isbn, $copy) {
		date_default_timezone_set ( 'UTC' );
		mysql_query ( "UPDATE Book_Status SET status='out' WHERE isbn='$isbn' AND copy='$copy'" );
		
		$current_username = $_SESSION ['username'];
		$id = Database::getCurrentUserId ( $current_username );
		$due_date = date ( 'Y:m:d', strtotime ( "+7 day" ) );
		
		mysql_query ( "INSERT INTO Book_date (isbn, copy, user_id, book_date)
		VALUES ('$isbn', $copy, $id, '$due_date')" );
		$output = '<p> Check out successful </p>';
		return $output;
	}
	
	public function display_out() {
		$id = Database::getCurrentUserId ( $_SESSION ['username'] );
		$result = mysql_query ( "SELECT DISTINCT * FROM Book, Book_Status, Book_date 
		WHERE Book.isbn = Book_Status.isbn AND Book_Status.isbn = Book_date.isbn AND 
		Book_Status.copy = Book_date.copy AND Book_date.user_id = $id" );
		$output = array ();
		//build out put. 
		if (mysql_num_rows ( $result ) != 0) {
			
			while ( ($row = mysql_fetch_array ( $result )) != FALSE ) {
				$output [] = array ($row ['isbn'], $row ['copy'], $row ['author'], $row ['year'], $row ['book_date'] );
			}	
		}
		return $output;
	}
	
	public function addNewBook($isbn, $author, $title, $year) {
		$query = "SELECT * FROM Book WHERE isbn ='$isbn'";
		$result = mysql_query ( $query );
		
		if (mysql_num_rows ( $result ) == 0) {
			//add to both book and book status. 
			mysql_query ( "INSERT INTO Book (isbn, author, title, year)
			VALUES ('$isbn', '$author', '$title', '$year')" );
			
			mysql_query ( "INSERT INTO Book_Status (isbn, copy, status)
			VALUES ('$isbn', 1, 'in')" );
			return true;
		} else {
			//add a new copy.
			$copy = 0;
			$result = mysql_query ( "SELECT copy FROM Book_Status WHERE isbn = '$isbn'" );
			while ( ($row = mysql_fetch_array ( $result )) != FALSE ) {
				if ($copy < $row ['copy']) {
					$copy = $row ['copy'];
				}
			}
			$copy += 1;
			mysql_query ( "INSERT INTO Book_Status (isbn, copy, status)
			VALUES ('$isbn', $copy, 'in')" );
			return false;
		}
	}
}

?>