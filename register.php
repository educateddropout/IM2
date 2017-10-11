<?php

	include 'scripts/dbcon.php';

	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header('Content-Type: application/download; charset=utf-8');


    // decoding of post data //
    $postdata = file_get_contents("php://input");
    $request = (array)json_decode($postdata);

    $username = $request["username"];
    $password = $request["password"];
    $firstName = $request["firstName"];
    $middleName = $request["middleName"];
    $lastName = $request["lastName"];
    $address = $request["address"];
    echo $birthday = $request["birthday"];
    $emailAddress = $request["emailAddress"];
    $contactNum = $request["contactNumber"];
    $oContactNum = $request["oContactNumber"];
    $addedBy = "0000000001"; // admin user id
    $dateAdded = date('Y/m/d H:i:s'); // date today
    $updatedBy = "0000000001"; // admin user id
	$lastModified = date('Y/m/d H:i:s'); // date today
	$userType = 2; // casual
	$archive = 0; // active
    //echo "test";

    $sql = "INSERT INTO users (Username, Password, Last_name, Given_name, Middle_name, 
    								Birthday, Address, Email, Contact_Num, Other_Contact_Num, 
    								Added_by, Date_Added, Updated_by, Last_Modified, UserType, Archive)
							VALUES ('".$username."', '".$password."', '".$lastName."', '".$firstName."','".$middleName."',
									'".$birthday."','".$address."','".$emailAddress."','".$contactNum."','".$oContactNum."',
									'".$addedBy."','".$dateAdded."','".$updatedBy."','".$lastModified."','".$userType."','".$archive."')";

	/*/ -- Field Names from registration page -- //
	$username = $_POST["username"];
	$password =  $_POST["password"];
	$emailAddress = $_POST["email_address"];
	$firstName = $_POST["first_name"];
	$middleName = $_POST["middle_name"];
	$lastName = $_POST["last_name"];
	$birthday = $_POST["birthday"];
	$address = $_POST["address"];
	$contactNumber = $_POST["contact_number"];
	$oContactNumber = $_POST["other_contact_number"];

	
	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
	VALUES ('John', 'Doe', 'john@example.com')";*/

	/*if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}*/

?>