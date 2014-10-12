<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		

		$repush_tasks = $D->select("repush_task", "*", ["ORDER"=>"id DESC"]);

		wapReturns(array("repush_tasks"=>$repush_tasks), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

