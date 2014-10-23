<?php 
	
	require_once "../config/config.php";


	$fname = $_POST["fname"];
	
	if(isset($_FILES['file'])){
	    $errors= array();
	    $file_name = $_FILES['file']['name'];
	    $file_size =$_FILES['file']['size'];
	    $file_tmp =$_FILES['file']['tmp_name'];
	    $file_type=$_FILES['file']['type'];

	    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

	    $extensions = array("jpeg","jpg","png");
	    $file_extensions = array("apk","ipa");

	    if($_POST["type"] == 'image' && in_array($file_ext,$extensions )=== false){
	        wapReturns("图片格式不对", -1);
	        exit;
	    }
	    if($_POST["type"] == 'file' && in_array($file_ext,$file_extensions )=== false){
	    	wapReturns("文件格式不对", -1);
	        exit;
	    }
	    if($file_size > 2097152){
	        wapReturns("图片太大", -1);
	        exit;
	    }               
	    if(empty($errors)==true){
	    	if($_POST["type"] == 'image') {
	        	$folder = "uimage/";
	        }else if($_POST['type'] == 'file'){
	        	$folder = "ufile/";
	        }
	        move_uploaded_file($file_tmp, '../'. $folder.$file_name);

	        wapReturns(array("filepath" => $APP_ROOT_PATH.$folder.$file_name), 0);
	    }else{
	        wapReturns("上传出现错误", -1);
	    }
	}
