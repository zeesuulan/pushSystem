<?php
// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
 
if (isset($_REQUEST["register_id"])) {
	$gcm_regid = $_REQUEST["register_id"]; // GCM Registration ID
    
    
    // Store user details in db
    include_once 'db_functions.php';
    //include_once './GCM.php';
	
    $db = new DB_Functions();

    echo $db->deleteUser($gcm_regid);
} else {
    echo "Parameters are wrong!";
}
?>