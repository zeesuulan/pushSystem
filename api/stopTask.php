<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		if(file_exists("../cron/push_lock.js")){
			$file = fopen("../cron/push_lock.js", "w+");
			fwrite($file, "stop");
			fclose($file);
			wapReturns("暂停成功", 0);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

