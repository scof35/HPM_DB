<?php
 
/*
 * Following code will update a appareil information
 * A appareil is identified by appareil id (pid)
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['id_maison']) && isset($_POST['id_capteur']) && isset($_POST['etat_demande'])) {
 
    $id_maison = $_POST['id_maison'];
    $id_capteur = $_POST['id_capteur'];
	$etat_demande = $_POST['etat_demande'];
 
    // include db connect class
require_once __DIR__ . '/DB_Connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql update row with matched pid
    $result = mysql_query("UPDATE apps SET etat_demande = $etat_demande WHERE id_capteur = $id_capteur");
 
    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "appareil successfully updated.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>