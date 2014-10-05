<?php 

	require '../config/config.php';
	if(isset($_GET['filepath'])){
		$path = $_GET['filepath'];
		
		if(strrpos($path, "http://") == 0 || 
			strrpos($path, "https://") == 0 || 
			stripos($path, "ftp://") == 0){
			$l = $path;
		}else{
			$l = $SERVER_ROOT.$path;
		}
		if($D->has("download_log",[
				"file_path" => $path
			])){
			$op = $D->update("download_log", ["download_num[+]" => 1], [
				"file_path" => $path
			]);
		}else{
			$op = $D->insert("download_log", ["download_num" => 1, "file_path" => $path]);
		}
		if($op){
			Header("Location:".$path);
		}
	}else{
		$D->update("download_log", ["download_num[+]" => 1], [
				"file_path" => "error_path"
			]);
		Header("Location:".$SERVER_ROOT);
	}

