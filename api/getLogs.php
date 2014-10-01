<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])) {
		
		$singleLogs = $D->select("push_log", [
				"[>]push_task" => ["task_id" => "id"]
			],[
				"push_task.title(title)",
				"push_log.operator",
				"push_log.datetime",
			],[
				"type" => 'single',
				"ORDER" => "push_log.datetime DESC"
			]);

		$repushlogs = $D->select("push_log", [
				"[>]push_task" => ["task_id" => "id"]
			],[
				"push_task.title(title)",
				"push_log.operator",
				"push_log.datetime",
			],[
				"type" => 'repush',
				"ORDER" => "push_log.datetime DESC"
			]);

		wapReturns(array("singleLogs" => $singleLogs,
		 "repushlogs" => $repushlogs), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

