<?php 
	
	require '../config/config.php';
	require '../lib/__gcmSender.php';
	require '../cron/go.php';

	//checktime

	$file = fopen(CONFIGFILE_PATH, "r");
	$timeStr = fread($file, "24");
	$currentHour = date("H");
	$shouldPush = false;
	$blank_task = 0;
	$total_task = $D->count("repush_task");
	$total_push = 0;

	fclose($file);

	for($index = 0; $index < strlen($timeStr); $index++){
		if($index == $currentHour && $timeStr[$index] == 1){
			$shouldPush = true;
			break;
		}
	}

	if($shouldPush){
		$repush_tasks = $D->get("repush_task", "*", ["ORDER"=>"index DESC"]);

		if($repush_tasks){
			$res = go($repush_tasks['id'], "repush");

			if(is_array($res)) {
				//成功了
			}else{
				//失败了
			}
			$D->update("repush_task", [
				"index" => 0
				], [
				"id" => $repush_tasks['id']
			]);
		}
	}

