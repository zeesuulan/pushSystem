<?php 
	require '../config/config.php';

	if(isset($_POST)){
		if ($D->has("user", [
				"AND" => [
					"OR" => [
						"username" => $_POST['username']
					],
					"password" => $_POST['password']
				]
			])){
				$group = $D->get("user", ["group"], ["username"=>$_POST['username']]);
				wapReturns(array("username"=>$_POST['username'], "group"=>$group["group"]), 0);
		}else{
			wapReturns("用户名或者密码错误", -1);
		}
	}else{
		 Header("Location:".$APP_ROOT);
	}

