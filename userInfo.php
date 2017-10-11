<?php
	
	header("Access-Control-Allow-Origin: *");
    //header("Content-Type: application/json; charset=UTF-8");
    //header('Content-Type: application/download; charset=utf-8');

    session_start();

	$jsonOutput = '{';

	if(isset($_SESSION["im_user_id"]) ){

		$id = $_SESSION["im_user_id"];
        $userType = $_SESSION["im_user_type"];
        $name = $_SESSION["im_name"];
        $username = $_SESSION["im_username"];

		

		if($userType != 1){
			$jsonOutput .= ' "errorCtr" : 1 ';
		}
		else{
			$jsonOutput .= ' "name" : "'.$name.'",';
			$jsonOutput .= ' "id" : "'.$id.'",';
			$jsonOutput .= ' "userType" : "'.$userType.'",';
			$jsonOutput .= ' "username" : "'.$username.'",';
			$jsonOutput .= ' "errorCtr" : 0 ';
		}
	}
	else{
		$jsonOutput .= ' "errorCtr" : 1 ';
	}

	$jsonOutput .= '}';
	echo $jsonOutput;
?>