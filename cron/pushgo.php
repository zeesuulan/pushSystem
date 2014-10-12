<?php 
	
	require '../config/config.php';
	require '../lib/__gcmSender.php';

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
		findTaskGo();
	}


	function findTaskGo(){

		global $D, $total_task,$total_push,$blank_task;

		$EVERY = 1;
		$REPUSHDB = "repush_task";

		$repush_tasks = $D->get("repush_task", "*", ["ORDER"=>"index DESC"]);

		if($repush_tasks){
			
			//批次个数，需要设定			
			$current_batch = 1;

			$current_task_id = $repush_tasks['id'];
			$continue = false;
			$lock = fopen(PUSHLOCK, "w+");

			$task = $D->get($REPUSHDB, "*" , [
					"ORDER" => "index DESC"
				]);

			$like = array();
			$where = array();

			if($task['country'] != "") {
				$like['country'] = explode("|", $task['country']);
			}

			if($task['language'] != "") {
				$like['language'] = explode("|", $task['language']);
			}

			if(count($like) > 0) {
				$where['LIKE'] = ["AND" => $like];
			}

			// do{
				$from = $current_batch * $EVERY;
				$continue = true;

				//超过总数
				if($from + $EVERY > $task["push_num"]){
					$EVERY = $task['push_num'] - $from;
					$continue = false;
				}

				$where['LIMIT'] = array($from, $EVERY);
				$targets = $D->select("flashgame", "*", $where);

				if(!$targets) {
					$continue = false;

					//下一个任务
					$D->update($REPUSHDB, [
						"index" => 0
						], [
						"id" => $current_task_id
						]);
					sleep(1);

					findTaskGo();
					//所有任务都没有合适的registr_id
					++$blank_task;
					if($blank_task == $total_task){
						$continue = false;
						break;
					}
				}else{
					fwrite($lock, "任务: ". $repush_tasks['title'] ." 正在推送中,已经推送到第".$current_batch."批，共".$from."个\n");

					$r_ids = array();

					for($index = 0; $index < count($targets); ++$index) {
						array_push($r_ids, $targets[$index]['register_id']);
					}

					$r_ids = join(",", $r_ids);

					$res = send(array(
						"title" => $task['title'],
						"content" => $task["content"],
						"imageURL" => $task["image"],
						"linkURL" => $task["file"],
						"register_ids" => $r_ids,
					));

					$D->insert("push_log", [
						"task_id" => $task['id'],
						"operator" => $_COOKIE['username'],
						"datetime" => date("Y-m-d H:i:s"),
						"type" => "repush"
					]);

					var_dump(json_decode($res));
				}

				sleep(1);

				++$current_batch;
			// }while($continue);
			var_dump($current_task_id);
			fclose($lock);

		}
	}
