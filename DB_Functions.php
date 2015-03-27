<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
     function __construct() {
        require_once __DIR__ . '/DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    } 
	
    // destructor
    function __destruct() {
    }
 
    /**
     * Get user by login and password
     */
    public function getUserByEmailAndPassword($login, $password) {
        $result = mysql_query("SELECT * FROM maisons WHERE login='$login'") or die(mysql_error());

		// check for result 		
        if (mysql_num_rows($result)> 0) {
            $result = mysql_fetch_array($result);
            $db_password = $result['password'];   
            if ($db_password == $password) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }
 
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }
 
}
 
?>