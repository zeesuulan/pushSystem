<?php 

	require '../config/config.php';
	require '../lib/__gcmSender.php';
	require '../cron/go.php';


	if(isset($_COOKIE['username']) && isset($_POST['task_id'])){
		if ($D->has("push_task", [
				"id" => $_POST['task_id']
			])){

			$result = go($_POST['task_id'], "single");

			wapReturns(array("result"=>$result), 0);
				
		}else{
			wapReturns("任务不存在", -1);
		}
	}else{
		wapReturns("你未登录呀！亲", -1);
	}

