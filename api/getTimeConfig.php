<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		$file = fopen(CONFIGFILE_PATH, "a+");
		if($file){
			$line = fread($file, "24");
			fclose($file);
			wapReturns(array("hour"=>$line), 0);
		}
		wapReturns("获取出现问题", -1);
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

