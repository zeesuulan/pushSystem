<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		if(isset($_POST['id'])){
			$dbname = "repush_task";

			if($D->has($dbname, [
				"id" => $_POST['id']
				])){
				
				$max = $D->max($dbname, "index");

				$D->update($dbname, [
						"index" => ++$max
					], [
						"id" => $_POST['id']
					]);
				wapReturns("", 0);
			}
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

