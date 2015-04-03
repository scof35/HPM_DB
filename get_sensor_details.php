<?php
 
/*
 * Following code will get single appareil details
 * A appareil is identified by appareil id (id_capteur)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// check for post data
if (isset($_GET["id_capteur"])) {
    $id_capteur = $_GET['id_capteur'];
	$id_maison = $_GET['id_maison'];
 
    // get a appareil from appareils table
    $result = mysql_query("SELECT * FROM appareils WHERE id_capteur = $id_capteur AND id_maison = $id_maison");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $appareil = array();
            $appareil["id_capteur"] = $row["id_capteur"];
			$appareil["description_capteur"] = $row["description_capteur"];
			$appareil["puissance_consommee"] = $row["puissance_consommee"];
			$appareil["etat_reel"] = $row["etat_reel"];
			$appareil["etat_demande"] = $row["etat_demande"];
			$appareil["demande_traitee"] = $row["demande_traitee"];
            // success
            $response["success"] = 1;
 
            // user node
            $response["appareil"] = array();
 
            array_push($response["appareil"], $appareil);
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no appareil found
            $response["success"] = 0;
            $response["message"] = "No appareil found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no appareil found
        $response["success"] = 0;
        $response["message"] = "No appareil found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>