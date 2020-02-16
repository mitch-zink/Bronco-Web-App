<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');
//fetch inputs
$phoneid = filter_input(INPUT_POST, "phoneid");
$type = filter_input(INPUT_POST, "type");
$price = filter_input(INPUT_POST, "price");
$date = filter_input(INPUT_POST, "date");
$quantity = filter_input(INPUT_POST, "quantity");
$partid = filter_input(INPUT_POST, "part_id");


/*//validate
if ($itname === null || $itname === false || 
		$itdesc === null || $itdesc === false || 
		$quantity === null || $quantity === false) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //Insert vendor 
	$sql = 'INSERT INTO transaction
				(phoneid, partid, date, price, transtype, quantity)
			  VALUES
				(:phoneid, :partid, :date, :price, :type, :quantity)';
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':phoneid', $phoneid);
      $stmt->bindValue(':partid', $partid);
      $stmt->bindValue(':date', $date);
      $stmt->bindValue(':price', $price);
      $stmt->bindValue(':type', $type);
      $stmt->bindValue(':quantity', $quantity);
                     
      $stmt->execute();
      $stmt->closeCursor();
    
    // Go to index.php
	// echo "Part Added!";
    include('viewTransaction.php');

//} 

?>