<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		$games = $D->select("flashgame", "*");

		wapReturns(array("games" => $games), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

