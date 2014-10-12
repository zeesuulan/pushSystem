<?php 

	require '../config/config.php';

	if(isset($_COOKIE['username'])){
		$filepath = '../static_config/push_hour';
		
		if(isset($_POST['hour'])) {
			$hour = $_POST['hour'];
			if($hour >= 0 && $hour <= 23) {
				
				$file = fopen($filepath, "a+");
				if($file){
					$line = fread($file, "24");
					fclose($file);

					if(!$line){
						$str = "000000000000000000000000";
					}else{
						$str = $line;
					}

					if($_POST['type'] == 'add') {
						for($index = 23; $index >= 0; $index--){
							if($index != $hour){
								$str[$index] = $str[$index] | 0;
							}else{
								$str[$index] = 1;
							}
						}
					}else if($_POST['type'] == 'del'){
						for($index = 23; $index >= 0; $index--){
							if($index == $hour){
								$str[$index] = 0;
							}
						}
					}

					$file = fopen($filepath, "w+");
					fwrite($file, $str);
					fclose($file);

					wapReturns(array("hour"=>$str), 0);
				}
				wapReturns("修改出现问题", -1);
			}
		}else{
			wapReturns("输入的时间有错误！", -1);
		}
	}else{
		wapReturns("用户名或者密码错误", -1);
	}

