<?php

/**
 * Connection Class
 * Purpose: To provide a database connection to the application
 * 
 * Information is processed securely from within this file, the database connection information
 * will not be made available to the outside world.
 * @author James P Smith
 * Adapted By: Tylor Faoro 
 */
class Connection{
	private $host;
	private $user;
	private $pass;
	private $db;
	

	//:: Constructor for the Database connection
	public function Connection(){
		$this->host = "localhost";			// host name
		$this->user = "nigma_dev";		// user to connect as
		$this->pass = "N0v3mber86";	// user password
		$this->db	= "nigma_development";				// database name
	}
	
	//public function Connection(){
		//$this->host = "nigmaworldTest.db.8425501.hostedresource.com";			// host name
		//$this->user = "nigmaworldTest";		// user to connect as
		//$this->pass = "N0v3mber86!";	// user password
		//$this->db	= "nigmaworldTest";				// database name
	//}
	
	//:: Method for connecting to the database.
	public function connect(){
		
		$con=mysqli_connect("$this->host","$this->user","$this->pass","$this->db");
		
		// Check connection		
		if (mysqli_connect_errno()){
			echo "Error: " . mysqli_connect_error();
		}
		return $con;
	}
	
	
}
?>