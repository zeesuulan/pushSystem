<?php 
	
	require_once "../config/config.php";

	if(isset($_COOKIE['username'])){
		if(isset($_POST)){
			$p = $_POST;
			if(!$p['username'] ||
				!$p['password'] ||
				!$p['confirm_password']){
					wapReturns("必填项未填写！", -1);
					exit;
			}else if($p['password'] != $p['confirm_password']){
				wapReturns("密码不一致", -1);
				exit;
			}

			$user_id = $D->insert("user", [
					"username" => $p['username'],
					"password" => $p['password'],
					"group" => 2
				]);

			if($user_id) {
				wapReturns("", 0);
			}else{
				wapReturns("增加用户失败", -1);
			}
		}else{
			wapReturns("增加用户失败", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}
