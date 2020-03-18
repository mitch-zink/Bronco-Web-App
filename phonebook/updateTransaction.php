<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//fetch inputs
$transid = filter_input(INPUT_POST, "transid");
$phoneid = filter_input(INPUT_POST, "phoneid");
$partid = filter_input(INPUT_POST, "partid");
$type = filter_input(INPUT_POST, "type");
$price = filter_input(INPUT_POST, "price");
$date = filter_input(INPUT_POST, "date");
$quantity = filter_input(INPUT_POST, "quantity");


/*//validate
if ($transid === null || $phoneid === null || $partid === null || $type === null || $price === null || 
		$date === null || $quantity === null) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */

   
    //update vendor 
	$sql = 'UPDATE transactions
                SET phoneid =:phoneid, partid =:partid, transtype =:type, price =:price, 
                date =:date, quantity =:quantity WHERE transid =:transid';
      
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':phoneid', $phoneid);
        $stmt->bindValue(':partid', $partid);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':transid', $transid); 
        $stmt->execute();
        $stmt->closeCursor();
//}
    include('viewTransaction.php');
?>