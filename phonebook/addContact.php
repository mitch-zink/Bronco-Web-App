<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');
//fetch inputs
$fname = filter_input(INPUT_POST, "fname");
$lname = filter_input(INPUT_POST, "lname");
$biz = filter_input(INPUT_POST, "biz");
$addr1 = filter_input(INPUT_POST, "addr1");
$addr2 = filter_input(INPUT_POST, "addr2");
$city = filter_input(INPUT_POST, "city");
$state = filter_input(INPUT_POST, "state");
$zip = filter_input(INPUT_POST, "zip");
$email = filter_input(INPUT_POST, "email");
$phone = filter_input(INPUT_POST, "phone");

/*//validate
if ($itname === null || $itname === false || 
		$itdesc === null || $itdesc === false || 
		$quantity === null || $quantity === false) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //Insert phonebook 
	$sql = 'INSERT INTO phonebook
				(firstname, lastname, business, addr1, addr2, city, state, zip, emailaddress, phonenumber)
			  VALUES
				(:fname, :lname, :biz, :addr1, :addr2, :city, :state, :zip, :email, :phone)';
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':fname', $fname);
      $stmt->bindValue(':lname', $lname);
      $stmt->bindValue(':biz', $biz);
      $stmt->bindValue(':addr1', $addr1);
      $stmt->bindValue(':addr2', $addr2);
      $stmt->bindValue(':city', $city);
      $stmt->bindValue(':state', $state);
      $stmt->bindValue(':zip', $zip);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':phone', $phone);               

      $stmt->execute();
      $stmt->closeCursor();
    
    // Go to index.php
	// echo "Contact Added!";
    include('phonebook.php');

//} 