<?php 
	
	require_once "../config/config.php";

	if(isset($_COOKIE['username'])){
		if(isset($_POST)){
			$p = $_POST;
			if(!$p['type'] ||
				!$p['id']){
					wapReturns("错误操作", -1);
					exit;
			}

			$del_id = $D->delete($p['type'], [
					"id" => $p['id']
				]);

			if($del_id) {
				wapReturns("", 0);
			}else{
				wapReturns("删除失败", -1);
			}
		}else{
			wapReturns("删除失败", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}
