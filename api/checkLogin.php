<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		if ($D->has("user", [
				"username" => $_COOKIE['username']
			])){
				wapReturns("", 0);
		}else{
			wapReturns("用户名或者密码错误", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

