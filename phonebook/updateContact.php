<?php
require_once("../dbconnect.php");

//fetch inputs
$phoneid = filter_input(INPUT_POST, "phoneid");
$fname = filter_input(INPUT_POST, "fname");
$lname = filter_input(INPUT_POST, "lname");
$business = filter_input(INPUT_POST, "business");
$addr1 = filter_input(INPUT_POST, "addr1");
$addr2 = filter_input(INPUT_POST, "addr2");
$city = filter_input(INPUT_POST, "city");
$state = filter_input(INPUT_POST, "state");
$zip = filter_input(INPUT_POST, "zip", FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");


//validate goes here

   
    //update vendor 
	$sql = 'UPDATE phonebook
            SET firstname = :fname,
                lastname = :lname,
                business = :business,
                addr1 = :addr1,
                addr2 = :addr2,
                city = :city,
                state = :state,
                zip = :zip,
                emailaddress = :email,
                phonenumber = :phone
            WHERE phoneid = :phoneid';
        $stmt = $db->prepare($sql);     
        $stmt->bindvalue(":fname", $fname);
        $stmt->bindValue(":lname", $lname);
        $stmt->bindValue(":business", $business);
        $stmt->bindValue(":addr1", $addr1);
        $stmt->bindValue(":addr2", $addr2);
        $stmt->bindValue(":city", $city);
        $stmt->bindValue(":state", $state);
        $stmt->bindValue(":zip", $zip);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":phone", $phone);
        $stmt->bindValue("phoneid", $phoneid);
        $stmt->execute();
        $stmt->closeCursor();
    
    // Go to index.php
	echo "Contact Updated!";
    include('phonebook.php');
?>