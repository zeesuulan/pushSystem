<?php
class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once 'db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }
    
    //安全过滤函数
    public function safe($s) { 
		if(get_magic_quotes_gpc()) { 
			$s = stripslashes($s); 
		}
		
		return mysql_real_escape_string($s);
	}
	
	/**
	 * get the ip details
	 */
	function getLocationInfoByIp(){
		$client = "";
		if (isset($_SERVER['HTTP_CLIENT_IP'])) $client = $_SERVER['HTTP_CLIENT_IP'];
		$forward = "";
     	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	$real = "";
    	if (isset($_SERVER['HTTP_X_REAL_IP'])) $real = $_SERVER['HTTP_X_REAL_IP'];
    	
    	$remote  = $_SERVER['REMOTE_ADDR'];
	    $result  = array('country'=>'', 'city'=>'');
    
    	if(filter_var($client, FILTER_VALIDATE_IP)){
        	$ip = $client;
	    } else if(filter_var($forward, FILTER_VALIDATE_IP)){
    	    $ip = $forward;
	    } else if(filter_var($real, FILTER_VALIDATE_IP)){
    	    $ip = $real;
	    } else {
    	    $ip = $remote;
	    }
	
    	$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
	    if($ip_data && $ip_data->geoplugin_countryName != null){
    	    $result['country'] = $ip_data->geoplugin_countryCode;
        	$result['city'] = $ip_data->geoplugin_city;
	    }
    	return $result;
	}	

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($register_id, $app_id, $app_name, $device_id, $device_info, $version, $other_info) {
    	$register_id = $this->safe($register_id);
    	$app_id = $this->safe($app_id);
    	$app_name = $this->safe($app_name);
    	$device_id = $this->safe($device_id);
    	$device_info = $this->safe($device_info);
    	$version = $this->safe($version);
    	$other_info = $this->safe($other_info);
    	
    	//get the ip detail
    	$ipInfo = $this->getLocationInfoByIp();
    	$country = $ipInfo['country'];
    	$city = $ipInfo['city'];	

    	if ($this->isExisted($register_id) == true) {
    		$result = mysql_query("UPDATE flashgame SET country='$country',city='$city',time = NOW() WHERE register_id = '$register_id'");
       	 	return "Updated the register data successfully!";
    	}
    	

    	// insert user into database
    	$query_str = "INSERT INTO flashgame(register_id, app_id, app_name, device_id, device_info, version, other_info, country, city, time) VALUES('$register_id', '$app_id', '$app_name', '$device_id', '$device_info', '$version', '$other_info', '$country', '$city', NOW())";
    	
    	//return $query_str;
    	
        $result = mysql_query($query_str);
        // check for successful store
        if ($result) {
            // get user details
            //$id = mysql_insert_id(); // last inserted id
            //$result = mysql_query("SELECT * FROM flashgame WHERE id = $id") or die(mysql_error());
            // return user details
            //if (mysql_num_rows($result) > 0) {
            //    return mysql_fetch_array($result);
            //} else {
            //     return false;
            //}
            return "Register successfully!";
        } else {
            return "Register fail!";
        }
    }
    
    
    /**
     * delete user
     */
    public function deleteUser($register_id) {
    	$register_id = $this->safe($register_id);
    
        $result = mysql_query("delete FROM flashgame WHERE register_id=\"$register_id\"");
        return $result;
    }
    
    /**
     * get user count
     */
    public function getUserCount($filters) {
        $query_str = 'SELECT COUNT(id) FROM `flashgame` WHERE ';
        $query_str = $query_str.join(' AND ', $filters);
        
        $result = mysql_query($query_str);
        if($row = mysql_fetch_row($result)){
    		$result=$row[0];
		}
        return $result;
    }
    
    
    public function getCountryData() {
    	$result = mysql_query("SELECT distinct country, city FROM flashgame");
    	
        //返回数据
		$returnData = array();
		while($r = mysql_fetch_assoc($result)) {
    		$returnData[] = $r;
		}
		
		return json_encode($returnData);
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM flashgame");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isExisted($register_id) {
        $result = mysql_query("SELECT register_id from flashgame WHERE register_id = '$register_id'");
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