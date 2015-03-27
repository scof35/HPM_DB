<?php

 /**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
        $this->connect(); 
    }
 
    // destructor
    function __destruct() {
         $this->close();
    }
 
    // Connecting to database
    public function connect() {
	    // import database connection variables
        require_once __DIR__ . '/config.php';
        
		// connecting to mysql
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());		
		
        // selecting database
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        // return database handler
        return $con;
    }	
 
    // Closing database connection
    public function close() {
        mysql_close();
    }
 
}
 
?>