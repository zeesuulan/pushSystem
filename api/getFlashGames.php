<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		$games = $D->count("flashgame", "id");
		$tasks = $D->select("push_task", "*");

		wapReturns(array("games" => $games, "tasks"=>$tasks), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

