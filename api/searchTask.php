<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		if(isset($_POST['key'])) {
			$tasks = $D->select("push_task", "*",[
					'LIKE' => [
						'OR' => [
							"title" => $_POST['key'],
							"content" => $_POST['key']
						]
					]
				]);

			wapReturns(array("tasks"=>$tasks), 0);
		}else{
			wapReturns("搜索条件不对", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

