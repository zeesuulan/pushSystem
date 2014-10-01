<?php
/**
 * Database config variables
 */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "123");
define("DB_DATABASE", "GCM");
/*
 * Google API Key
 */
define("GOOGLE_API_KEY", "AIzaSyDSwjDATD72McZRbQdsAaWnaw1jE_73hwk");

date_default_timezone_set("Asia/Chongqing");

	$APP_ROOT_PATH = '/pushsystem/';
	$SERVER_PATH = $_SERVER['DOCUMENT_ROOT'];
	$SERVER_NAME = "http://".$_SERVER['SERVER_NAME'];

	$APP_ROOT = $SERVER_PATH . $APP_ROOT_PATH;
	$SERVER_ROOT = $SERVER_NAME . $APP_ROOT_PATH;

	$DATABASE_SERVER = 'localhost';
	$DATABASE_USERNAME = 'root';
	$DATABASE_PASSWORD = '123';
	$DATABASE_NAME = 'GCM';

	$VERSION = '1';

	require $APP_ROOT."lib/tools.php";
	require $APP_ROOT."lib/medoo.php";

	$D = new medoo([
		'database_type' => 'mysql',
		'database_name' => $DATABASE_NAME,
		'server' => $DATABASE_SERVER,
		'username' => $DATABASE_USERNAME,
		'password' => $DATABASE_PASSWORD
	]);
?>