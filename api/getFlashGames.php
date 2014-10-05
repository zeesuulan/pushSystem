<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		$games = $D->count("flashgame", "id");
		$priority_tasks = $D->select("push_task", "*", ["priority" => 1, "ORDER"=>"id DESC"]);
		$nomarl_tasks = $D->select("push_task", "*", ["priority" => 0, "ORDER"=>"id DESC"]);
		$countrys = $D->query('SELECT DISTINCT country FROM `flashgame` WHERE 1')->fetchAll(PDO::FETCH_ASSOC);


		wapReturns(array("games" => $games,
						 "priority_tasks"=>$priority_tasks,
						 "nomarl_tasks"=>$nomarl_tasks,
						 "countrys"=>$countrys), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

