<?php
include_once 'config.php';


if (isset($_REQUEST["db_password"]) == false) {
	echo "password should be set!";
	return;
}


// connecting to mysql
$con = mysql_connect(DB_HOST, DB_USER, $_REQUEST["db_password"]);
mysql_query("set names utf8");

// selecting database
mysql_select_db(DB_DATABASE);

$query_str = 'SELECT id,register_id,device_id,time FROM `flashgame` WHERE ';
$ands = array();

//过滤app_id
if (isset($_REQUEST["app_id_like"])) {
	array_push($ands, 'app_id like "%'.$_REQUEST["app_id_like"].'%"');
} else if (isset($_REQUEST["app_id_not_like"])) {
	array_push($ands, 'app_id not like "%'.$_REQUEST["app_id_not_like"].'%"');
}

//过滤语言
if (isset($_REQUEST["lang_like"])) {
	array_push($ands, 'device_info like "%language\":\"'.$_REQUEST["lang_like"].'%"');
} else if (isset($_REQUEST["lang_not_like"])) {
	array_push($ands, 'device_info not like "%language\":\"'.$_REQUEST["lang_not_like"].'%"');
}

//过滤国家
if (isset($_REQUEST["country_like"])) {
	array_push($ands, 'country = "'.$_REQUEST["country_like"].'"');
} else if (isset($_REQUEST["country_not_like"])) {
	array_push($ands, 'country != "'.$_REQUEST["country_not_like"].'"');
}

//过滤城市
if (isset($_REQUEST["city_like"])) {
	array_push($ands, 'city = "'.$_REQUEST["city_like"].'"');
} else if (isset($_REQUEST["city_not_like"])) {
	array_push($ands, 'city != "'.$_REQUEST["city_not_like"].'"');
}

//过滤版本
if (isset($_REQUEST["os_version_like"])) {
	array_push($ands, 'device_info like "%osversion\":\"'.$_REQUEST["os_version_like"].'%"');
}

$query_str = $query_str.join(' AND ', $ands).' order by time desc ';

//第几页
$page = 1;
if (isset($_REQUEST["page"])) {
	$page = (int)$_REQUEST["page"];
}

//数据长度
$dataLen = 100;
if (isset($_REQUEST["data_length"])) {
	$dataLen = (int)$_REQUEST["data_length"];
}

$query_str = $query_str.' limit '.($dataLen * ($page - 1)).', '.$dataLen;


//echo $query_str;
//return;

$result = mysql_query($query_str);

//返回数据
$returnData = array();
while($r = mysql_fetch_assoc($result)) {
    $returnData[] = $r;
}
print json_encode($returnData);
?>