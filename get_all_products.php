<?php
 
/*
 * Following code will list all the appareils
 */
 
// array for JSON response
$response = array();
 
 
// include db connect class
require_once __DIR__ . '/DB_Connect.php';

// connecting to db
$db = new DB_CONNECT();


// check for get data
if (isset($_GET["id_maison"])) {
	$id_maison = $_GET['id_maison'];

 
// get all appareils from appareils table
$result = mysql_query("SELECT *FROM apps WHERE id_maison=$id_maison") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // appareils node
    $response["apps"] = array();
	
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $appareil = array();
        $appareil["id_maison"] = $row["id_maison"];
		$appareil["id_capteur"] = $row["id_capteur"];
        $appareil["description"] = $row["description"];
        $appareil["puissance_cumulee"] = $row["puissance_cumulee"];
		$appareil["puissance_actuelle"] = $row["puissance_actuelle"];
		$appareil["etat_reel"] = $row["etat_reel"];
		$appareil["etat_demande"] = $row["etat_demande"];
		
        // push single appareil into final response array
        array_push($response["apps"], $appareil);		
    }
	
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no appareils found
    $response["success"] = 0;
    $response["message"] = "No appareils found";    
}
} else {

// required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
// echo no users JSON
    echo json_encode($response);
}
?>