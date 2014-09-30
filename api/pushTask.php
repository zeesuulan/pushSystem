<?php 

	require '../config/config.php';
	require '../lib/GCM.php';

	if(isset($_COOKIE['username']) && isset($_POST['task_id'])){
		if ($D->has("push_task", [
				"id" => $_POST['task_id']
			])){

				$task = $D->get("push_task", "*", [
						"id" => $_POST['task_id']
					]);

				if($task){
					$gcm = new GCM();
					$result = $gcm->send_notification($task['register_id'], $task['content']);
					//add log
					wapReturns(array("result"=>$result), 0);
				}else{
					wapReturns("任务不存在", -1);
				}
		}else{
			wapReturns("任务不存在", -1);
		}
	}else{
		wapReturns("你未登录呀！亲", -1);
	}
