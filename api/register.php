<?php
// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
 
if (isset($_REQUEST["register_id"]) && isset($_REQUEST["device_id"]) && isset($_REQUEST["app_id"]) && isset($_REQUEST["md5"])) {
	$gcm_regid = $_REQUEST["register_id"]; // GCM Registration ID
    $app_id = $_REQUEST["app_id"];
    $app_name = $_REQUEST["app_name"];
    $device_id = $_REQUEST["device_id"];
    $version = $_REQUEST["version"];
    
    $other_info = $_REQUEST["other_info"];
    $device_info = $_REQUEST["device_info"];
    
    $md5 = $_REQUEST["md5"];
    
    //check the md5 value
    if (md5($gcm_regid."[object Stage]".$app_id) != $md5) {
    	echo "md5 value is wrong!";
    	return;
    }
    
    // Store user details in db
    include_once 'db_functions.php';
    //include_once './GCM.php';
	
    $db = new DB_Functions();

    echo $db->storeUser($gcm_regid, $app_id, $app_name, $device_id, $device_info, $version, $other_info);
} else {
    echo "Parameters are wrong!";
}
?>