<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		if(isset($_POST['id'])) {
			$D->delete("push_task", [
				"id" => $_POST["id"]
			]);

			wapReturns("删除成功", 0);
		}else{
			wapReturns("所选择任务不存在", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

