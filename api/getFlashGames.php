<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		$games = $D->count("flashgame", "id");
		$tasks = $D->select("push_task", "*");
		$countrys = $D->query('SELECT DISTINCT country FROM `flashgame` WHERE 1')->fetchAll(PDO::FETCH_ASSOC);

		wapReturns(array("games" => $games,
						 "tasks"=>$tasks,
						 "countrys"=>$countrys), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

