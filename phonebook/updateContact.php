<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//fetch inputs
$transid = filter_input(INPUT_POST, "transid");
$phoneid = filter_input(INPUT_POST, "phoneid");
$partid = filter_input(INPUT_POST, "part_id");
$type = filter_input(INPUT_POST, "type");
$price = filter_input(INPUT_POST, "price");
$date = filter_input(INPUT_POST, "date");
$quantity = filter_input(INPUT_POST, "quantity");


//validate goes here

   
    //update vendor 
	$sql = 'UPDATE transaction
                SET phoneid =:phoneid, partid =:partid, type =:type, price =:price, 
                date =:date, quantity =:quantity where transid =:transid';
      
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':phoneid', $phoneid);
        $stmt->bindValue(':partid', $partid);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':transid', $transid);
      
        $stmt->execute();
        $stmt->closeCursor();
    
    // Go to index.php
	echo "Transaction Updated!";
    include('viewTransaction.php');
?>