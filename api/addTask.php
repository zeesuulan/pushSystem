<?php 
	
	require_once "../config/config.php";

	if(isset($_COOKIE['username'])){
		if(isset($_POST)){
			$p = $_POST;
			if(!$p['title'] ||
				!$p['content'] ||
				!$p['file'] ||
				!$p['image'] ||
				!$p['file'] ||
				!$p['push_num']){
				wapReturns("必填项未填写！", -1);
				exit;
			}else if(!$p['push_time'] && !$p['repush']){
				wapReturns("推送时间或者是否重复推送未选择", -1);
				exit;
			}

			// if(isset($p['notThisCountry']) && $p['notThisCountry'] == 'on') {
			// 	$countrys = $D->query('SELECT DISTINCT country FROM `flashgame` WHERE 1')->fetchAll(PDO::FETCH_ASSOC);
			// 	//排除这些国家
			// }
			
			if(!isset($P['country'])) {
				$p['country'] = "";
			}else{
				$p['language'] = join("|", $p['country']);
			}
			
			if(!isset($P['language'])) {
				$p['language'] = "";
			}else{
				$p['language'] = join("|", $p['language']);
			}

			$last_task_id = $D->insert("push_task", [
				"title" => $p["title"],
				"content" => $p["content"],
				"file" => $p["file"],
				"image" => $p["image"],
				"country" => $p["country"],
				"language" => $p["language"],
				"push_num" => $p["push_num"],
				"push_time" => $p["push_time"],
				"repush" => isset($p["repush"]) ? 1 : 0,
				"priority" => isset($p["priority"])? 1 : 0
			]);

			if($last_task_id) {
				wapReturns("增加任务成功", 0);
			}else{
				wapReturns("增加任务失败", -1);
			}
		}else{
			wapReturns("增加任务失败", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}
