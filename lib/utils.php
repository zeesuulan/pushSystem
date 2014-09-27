<?php
// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
 
if (isset($_REQUEST["todo"])) {
	include_once 'db_functions.php';
	
	$todo = $_REQUEST["todo"];
	if ($todo == "GetUserCount") {
		$db = new DB_Functions();
		
		$filters = array();
		//过滤app_id
		if (isset($_REQUEST["app_id_like"])) {
			array_push($filters, 'app_id like "%'.$_REQUEST["app_id_like"].'%"');
		} else if (isset($_REQUEST["app_id_not_like"])) {
			array_push($filters, 'app_id not like "%'.$_REQUEST["app_id_not_like"].'%"');
		}

		//过滤语言
		if (isset($_REQUEST["lang_like"])) {
			array_push($filters, 'device_info like "%language\":\"'.$_REQUEST["lang_like"].'%"');
		} else if (isset($_REQUEST["lang_not_like"])) {
			array_push($filters, 'device_info not like "%language\":\"'.$_REQUEST["lang_not_like"].'%"');
		}

		//过滤国家
		if (isset($_REQUEST["country_like"])) {
			array_push($filters, 'country = "'.$_REQUEST["country_like"].'"');
		} else if (isset($_REQUEST["country_not_like"])) {
			array_push($filters, 'country != "'.$_REQUEST["country_not_like"].'"');
		}

		//过滤城市
		if (isset($_REQUEST["city_like"])) {
			array_push($filters, 'city = "'.$_REQUEST["city_like"].'"');
		} else if (isset($_REQUEST["city_not_like"])) {
			array_push($filters, 'city != "'.$_REQUEST["city_not_like"].'"');
		}

		//过滤版本
		if (isset($_REQUEST["os_version_like"])) {
			array_push($filters, 'device_info like "%osversion\":\"'.$_REQUEST["os_version_like"].'%"');
		}

    	echo $db->getUserCount($filters);
	} else if ($todo == "GetCountryData") {
		$db = new DB_Functions();
    	echo $db->getCountryData();
	}else {
		echo "What do you want to do?";
	}
	
    
    
    // Store user details in db
    
    //include_once './GCM.php';
	
    
} else {
    echo "Parameters are wrong!";
}
?>