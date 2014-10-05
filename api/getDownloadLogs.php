<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])) {
		
		$download_log = $D->select("download_log", [
				"[>]push_task" => ["file_path"=>"file"]
			],[
				"download_log.download_num",
				"download_log.file_path",
				"push_task.title",
			],[
				"ORDER" => "download_log.download_num DESC"
			]);
		// var_dump($D->last_query());
		$totle = $D->sum("download_log", "download_num");
		wapReturns(array("download_log" => $download_log, "totle" => $totle), 0);

	}else{
		wapReturns("用户名或者密码错误", -1);
	}

