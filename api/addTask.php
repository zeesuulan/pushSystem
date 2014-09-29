<?php 
	
	require_once "../config/config.php";

	if(isset($_COOKIE['username'])){
		if(isset($_POST)){
			$last_task_id = $D->insert("push_task", [
				"title" => $_POST["title"],
				"content" => $_POST["content"],
				"file" => $_POST["file"],
				"image" => $_POST["image"],
				"country" => $_POST["country"],
				"language" => $_POST["language"],
				"push_num" => $_POST["push_num"],
				"push_time" => $_POST["push_time"],
				"repush" => $_POST["repush"] == "on" ? 1 : 0,
				"priority" => $_POST["priority"] == "on" ? 1 : 0
			]);

			if($last_task_id) {
				wapReturns("增加任务成功", 0);
			}else{
				wapReturns("增加任务失败", -1);
			}
		}else{
			wapReturns("增加任务失败", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}
