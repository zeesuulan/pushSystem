<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username']) && isAdmin()) {
		
		$users = $D->select("user", [
				"username",
				"id"
			], [
				"group" => 2
			]);
		wapReturns(array("users" => $users), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

