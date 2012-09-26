<?php

/**
 * 
 * A database class, allows to open connection to the database. 
 * @author rithychhen
 * @version 2;
 */
class Database {
	/** database host.
	 */
	private $host;
	/** username for the database */
	private $username;
	/** database user's password */
	private $password;
	/** connection to the database */
	private $connection;
	/** the selected database, the one that we will be working on*/
	private $database;
	/**
	 * Construct a Database with an initialize databse;
	 */
	public function __construct() {
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = 'root';
		$this->connection = mysql_connect ( $this->host, $this->username, $this->password ) or die ();
		$this->database = mysql_select_db ( "library", $this->connection );
	}
	
	/**
	 * Get the current connection to the DB. 
	 */
	public function getConnection() {
		return $this->connection;
	}
	/** 
	 * Get the current database in use.
	 */
	public function getDatabase() {
		return $this->database;
	}
	
	 /**
	  * helper method, return the current user id base on current username.
	  */ 	
	public static function getCurrentUserId($curr_username) {
		//obtain the current user id by using current username.
		$result = mysql_query ( "SELECT * FROM Username WHERE Username = '$curr_username'" );
		$num = mysql_num_rows ( $result );
		if ($num != 0) {
			while ( ($row = mysql_fetch_array ( $result )) != false ) {
				$id = $row ['user_id'];
			}
		}
		return $id;
	}
}
?>