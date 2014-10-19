<?php 

	require '../config/config.php';
	require '../lib/__gcmSender.php';


	if(isset($_COOKIE['username']) && isset($_POST['task_id'])){
		if ($D->has("push_task", [
				"id" => $_POST['task_id']
			])){

				$task = $D->get("push_task", "*", [
						"id" => $_POST['task_id']
					]);

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
						$where['LIKE'] = ["AND" => $like];
					}
					
					$D->insert("push_log", [
						"task_id" => $_POST['task_id'],
						"operator" => $_COOKIE['username'],
						"datetime" => date("Y-m-d H:i:s"),
						"type" => "single"
					]);

					
					// $res = send(array(
					// 	"title" => $task['title'],
					// 	"content" => $task["content"],
					// 	"imageURL" => $task["image"],
					// 	"linkURL" => $task["file"],
					// 	"register_ids" => $r_ids,
					// ));

					$res = json_decode('{"multicast_id":5.24553438334e+18,"success":1,"failure":0,"canonical_ids":0,"results":[{"message_id":"0:1413723026041001%edb8c459f9fd7ecd"}]}');

					wapReturns(array("result"=>$res), 0);
				}else{
					wapReturns("任务不存在", -1);
				}
		}else{
			wapReturns("任务不存在", -1);
		}
	}else{
		wapReturns("你未登录呀！亲", -1);
	}

