<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		
		if(isset($_POST['key'])) {
			$key = $_POST['key'];
			$priority = null;
			$repush = null;

			if($key == '优先') {
				$priority = 1;
			}else if($_POST['key'] == '一般'){
				$priority = 0;
			}

			if($key == '重复') {
				$repush = 1;
			}

			$tasks = $D->select("push_task", "*",[
					'LIKE' => [
						'OR' => [
							"title" => $key,
							"content" => $key,
							"priority" => $priority,
							"repush" => $repush
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

