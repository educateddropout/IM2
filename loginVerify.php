<?php

	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    //header('Content-Type: application/download; charset=utf-8');
    include 'scripts/dbcon.php';

    $postdata = file_get_contents("php://input");
    $request = (array)json_decode($postdata);

    $username = $request["username"];
    $password = $request["password"];
    

    $jsonOutput = '{';


    $sQuery = "SELECT UserID, UserType, Archive, CONCAT(Given_Name, ' ' , Middle_Name,' ' , Last_Name) as Fullname
    				FROM user
					WHERE username = '".$username."' AND password = '".$password."'";

	//$query = mysqli_query($Conn,$sQuery);

    if (!$query = mysqli_query($Conn,$sQuery)){
    // "Error description: " . mysqli_error($Conn);
       $jsonOutput .= ' "queryError" : 0 '; // Invalid Query
    }
    else{

        if( !mysqli_num_rows($query) > 0) {
        	$jsonOutput .= ' "queryError" : 1 '; // Invalid User
        }
        else{

            // Getting of necessary info for session store
    		while ($row = mysqli_fetch_array($query)) {
                $id = $row['UserID'];
                $userType = $row['UserType'];
                $archive = $row['Archive'];
                $name = $row['Fullname'];
    	    }

            if($archive != 0 ){ // archive 0 means active
                $jsonOutput .= ' "queryError" : 2 '; // Not Active User

                if($userType != 1){ // admin account is equals to usertype 1
                    $jsonOutput .= ' "queryError" : 2 '; // Not an Admin User
                }
                else{
                    $jsonOutput .= ' "queryError" : 3 '; // No Error
                }
            }
            else{
                $jsonOutput .= ' "queryError" : 3 '; // No Error
            }




            session_start();
            $_SESSION["im_user_id"] = $id;
            $_SESSION["im_user_type"] = $userType;
            $_SESSION["im_name"] = $name;
            $_SESSION["im_username"] = $username;


    	}
    }

    
    
    $jsonOutput .= ' }';
    echo $jsonOutput;
?>