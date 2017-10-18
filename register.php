<?php

	include 'scripts/dbcon.php';

	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    //header('Content-Type: application/download; charset=utf-8');


    // decoding of post data //
    $postdata = file_get_contents("php://input");
    $request = (array)json_decode($postdata);

    $username = $request["username"];
    $password = $request["password"];
    $firstName = $request["firstName"];
    $middleName = $request["middleName"];
    $lastName = $request["lastName"];
    $address = $request["address"];
    $birthday = $request["birthday"];
    $emailAddress = $request["emailAddress"];
    $contactNum = $request["contactNumber"];
    $oContactNum = $request["oContactNumber"];
    $addedBy = "0000000001"; // admin user id
    $dateAdded = date('Y/m/d H:i:s'); // date today
    $updatedBy = "0000000001"; // admin user id
	$lastModified = date('Y/m/d H:i:s'); // date today
	$userType = 2; // casual
	$archive = 0; // active

	$errorCtr = 0;
	$jsonOutput = '{';

	//checking if the username is already exist
	$sql = "SELECT username
    				FROM user
					WHERE username = '".$username."'";

	if (!$query = mysqli_query($Conn,$sql)){
    	// "Error description: " . mysqli_error($Conn);
    	$jsonOutput .= ' "validateUsernameCtr" : 2 ,'; // Username already exist
       	$errorCtr = 1;
    }
    else{
    	if( mysqli_num_rows($query) > 0) {
        	$jsonOutput .= ' "validateUsernameCtr" : 1 ,'; // Username already exist
        	$errorCtr = 1;
        }
        else{
        	$jsonOutput .= ' "validateUsernameCtr" : 0 ,'; // Username valid for use
        }
    }
    // end of checking if the username is already exist

    //checking if the email address is already in use
	$sql = "SELECT username
    				FROM user
					WHERE Email = '".$emailAddress."'";

	if (!$query = mysqli_query($Conn,$sql)){
    	// "Error description: " . mysqli_error($Conn);
    	$jsonOutput .= ' "validateEmailAddCtr" : 2 ,'; // Email already in use
       	$errorCtr = 1;
    }
    else{
    	if( mysqli_num_rows($query) > 0) {
        	$jsonOutput .= ' "validateEmailAddCtr" : 1 ,'; // Email already in use
        	$errorCtr = 1;
        }
        else{
        	$jsonOutput .= ' "validateEmailAddCtr" : 0 ,'; // Email valid for use
        }
    }
    // end of checking if email address is already in use

    // Insert userinfo and register
    if($errorCtr == 0){

    	$sql = "INSERT INTO user (Username, Password, Last_name, Given_name, Middle_name, 
								Birthday, Address, Email, Contact_Num, Other_Contact_Num, 
								Added_by, Date_Added, Updated_by, Last_Modified, UserType, Archive)
						VALUES ('".$username."', '".$password."', '".$lastName."', '".$firstName."','".$middleName."',
								'".$birthday."','".$address."','".$emailAddress."','".$contactNum."','".$oContactNum."',
								'".$addedBy."','".$dateAdded."','".$updatedBy."','".$lastModified."','".$userType."','".$archive."')";
			
		if (!$query = mysqli_query($Conn,$sql)){
	    	// "Error description: " . mysqli_error($Conn);
	       	$jsonOutput .= ' "validateInsertInfoCtr" : 1 ,'; // Invalid Query insert
	    }
	    else{
	    	$jsonOutput .= ' "validateInsertInfoCtr" : 0 ,'; // valid Query
	    }

	}
	else{
		$jsonOutput .= ' "validateInsertInfoCtr" : 2 ,'; // Did not proceed due to email and username already in use
	}
	// End Insert userinfo and register

	$jsonOutput = substr($jsonOutput, 0, -1);
	echo $jsonOutput .= ' }';

?>