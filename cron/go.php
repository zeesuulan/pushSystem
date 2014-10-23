<?php 

define("LOCK", "push_lock.js");

	function go($task_id, $type) {

		global $D, $SERVER_ROOT;

		$DBName = ($type == 'single') ? "push_task" : "repush_task";
				//get TASK
		$task = $D->get($DBName, "*", [
					"id" => $task_id
				]);

		//GET register_id
		if($task){

			$like = array();
			$where = array();

			if($task['country'] != "") {
				$like['country'] = explode("|", $task['country']);
			}

			if($task['language'] != "") {
				$like['device_info'] = explode("|", $task['language']);
			}

			if(count($like) > 0) {
				$where['LIKE'] = ["OR" => $like];
			}

			$where["ORDER"] = "id DESC";

			$current_batch = 0;
			$continue = true;
			$EVERY = LIMIT;
			$success = 0;
			$total = 0;

			while($continue) {

				$file = fopen(LOCK, "r+");

				$txt = fread($file, 10);

				if($current_batch != 0 && $txt == 'stop'){
					$continue = false;
					fclose($file);
				}else{

					$from = $current_batch * LIMIT;
					//超过总数
					if($from + LIMIT >= $task["push_num"]){
						$EVERY = $task['push_num'] - $from;
						// $continue = false;
						fclose($file);
					}

					$file = fopen(LOCK, "w+");

					fwrite($file, "现在正在进行任务：".$task['title'].", 从".$from."个开始， 计划推送".$EVERY."个! 共".$task["push_num"]."个");
					fclose($file);

					//没有超过总数或者还有剩余的
					if(true) {
						$where['LIMIT'] = array($from, $EVERY);
						$games = $D->select("flashgame", ["id", "register_id"], $where);

						if(!$games){
							$continue = false;
						}else{
							$r_ids = array();

							for($index = 0; $index < count($games); ++$index) {
								array_push($r_ids, $games[$index]['register_id']);
							}

							$r_ids = join(",", $r_ids);

							if($r_ids == "") {
								$continue = false;
								return "没有合适的任务";
							}

							if(!DEBUG){
								$res = send(array(
									"title" => $task['title'],
									"content" => $task["content"],
									"imageURL" => $task["image"],
									"linkURL" => $SERVER_ROOT."api/download.php?filepath=".$task["file"],
									"register_ids" => $r_ids,
								));
							}else{
								$res = '{"multicast_id":5.24553438334e+18,"success":1,"failure":0,"canonical_ids":0,"results":[{"message_id":"0:1413723026041001%edb8c459f9fd7ecd"}]}';
							}

							$res = json_decode($res);

							$updateRest = $D->update($DBName, [
								"success[+]" => $res->success,
								"total[+]" => count($res->results)
							], [
								"id" => $task['id']
							]);

							$success += $res->success;
							$total += count($res->results);

							//删除出错的
							$r = $res->results;

							for($index = 0; $index < $total; ++$index){
								if(isset($r[$index]->error)) {
									$D->delete("flashgame", [
										"id" => $games[$index]['id']
										]);
								}
							}

							$D->insert("push_log", [
								"task_id" => $task['id'],
								"operator" => $_COOKIE['username'],
								"datetime" => date("Y-m-d H:i:s"),
								"type" => $type
							]);
							sleep(5);
						}
					}
					++$current_batch;
				}
			}
			$file = fopen(LOCK, "w+");
			fwrite($file, "stop");
			fclose($file);
			return array("success" => $success, "total" => $total);
		}else{
			return "任务不存在";
		}
	}
 ?>