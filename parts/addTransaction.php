<?php
require("../dbconnect.php");
//fetch inputs
$phoneid = filter_input(INPUT_POST, "phoneid");
$type = filter_input(INPUT_POST, "type");
$price = filter_input(INPUT_POST, "price");
$date = filter_input(INPUT_POST, "date");
$quantity = filter_input(INPUT_POST, "quantity");
$partid = filter_input(INPUT_POST, "partid");

/*//validate
if ($phoneid === null || $type === null || $price === null || 
		$date === null || $quantity === null || $partid === null) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //Insert vendor 
	$sql = 'INSERT INTO transactions
				(phoneid, partid, date, price, transtype, quantity)
			  VALUES
				(:phoneid, :partid, :date, :price, :type, :quantity)';
      
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':phoneid', $phoneid);
      $stmt->bindValue(':partid', $partid);
      $stmt->bindValue(':date', $date);
      $stmt->bindValue(':price', $price);
      $stmt->bindValue(':type', $type);
      $stmt->bindValue(':quantity', $quantity);
                     
      $stmt->execute();
      $stmt->closeCursor();
//}     
include('viewTransaction.php');



?>