<?php
	
	//header("Access-Control-Allow-Origin: *");
    //header("Content-Type: application/json; charset=UTF-8");
    //header('Content-Type: application/download; charset=utf-8');

	session_start();	
	unset($_SESSION["im_user_id"]);
	unset($_SESSION["im_user_type"]);
	unset($_SESSION["im_name"]);
	unset($_SESSION["im_username"]);
	
?>