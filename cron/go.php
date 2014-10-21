<?php 

	
	function go($task_id, $type) {

		global $D, $SERVER_ROOT;

		//get TASK
		$task = $D->get("push_task", "*", [
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
				$like['language'] = explode("|", $task['language']);
			}

			if(count($like) > 0) {
				$where['LIKE'] = ["OR" => $like];
			}

			$current_batch = 0;
			$continue = true;
			$EVERY = LIMIT;
			$success = 0;
			$total = 0;

			while($continue) {
				$from = $current_batch * LIMIT;
				//超过总数
				if($from + LIMIT > $task["push_num"]){
					$EVERY = $task['push_num'] - $from;
					$continue = false;
				}
				//没有超过总数或者还有剩余的
				if($continue || $lastBatch > 0) {
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

						$updateRest = $D->update("push_task", [
							"success[+]" => $res->success,
							"total[+]" => count($res->results)
						], [
							"id" => $_POST['task_id']
						]);

						$success += $res->success;
						$total += count($res->results);

						//删除出错的
						$r = $res->results;

						for($index = 0; $index < $total; ++$index){
							if(isset($r[$index]->error)) {
								$D->delete("flashgame", [
									"id" => $games[$index]->id
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
			return array("success" => $success, "total" => $total);
		}else{
			return "任务不存在";
		}
	}
 ?>