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

/*$checkEmail = 'SELECT COUNT(*) FROM phonebook
	                      WHERE emailAddress =:email';
		$stmt1 = $pdo->prepare( $checkEmail);
		$stmt1->bindValue(':email', $email);
        $stmt1->execute();
        $count = $stmt1->fetchColumn();

if ($fname === null || $lname === null||  $addr1 === null || 
        $city === null || $state === null || $zip === null || 
        $email === null || $phone === null) { 
        
    $error = "Invalid data. Check all fields and try again.";
    echo $error;
    include('phonebook.php');
}else if ($count>0) { echo "Please provide another Email Address. This address aleady exists";
    include('phonebook.php');
}else {*/

   
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
    echo "Contact Updated!";
//}
	
    include('phonebook.php');
?>