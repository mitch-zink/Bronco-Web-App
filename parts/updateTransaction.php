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

//Select part quantity
$sql4 = "SELECT quantity FROM parts WHERE partid = :partid";
$stmt4 = $pdo->prepare($sql4);
$stmt4->bindValue(":partid", $partid);
$stmt4->execute();
$quant = $stmt4->fetch();
$stmt4->closeCursor();

//var_dump($quant);

//Compare transaction quantity to part quantity 
$tquant = 0;
if($type === "Seller"){
  $tquant = $quant['quantity'] - $quantity; 
  
  //var_dump($tquant);
  //Validate current part inventory
  if($tquant < 0){
    $error = "Insufficent quantity in inventory. Check inventory and try again.";
    echo $error;
    
    }
    else {
    
  //update parts quantity
    $sql = 'UPDATE parts SET quantity = :tquant WHERE partid = :partid';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':tquant', $tquant);
    $stmt->bindValue(':partid', $partid);
    $stmt->execute();
    $stmt->closeCursor();
    
    //Update Transaction
	$sql1 = 'UPDATE transactions
        SET phoneid =:phoneid, partid =:partid, transtype =:type, price =:price, 
        date =:date, quantity =:quantity WHERE transid =:transid';
      
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindValue(':phoneid', $phoneid);
        $stmt1->bindValue(':partid', $partid);
        $stmt1->bindValue(':type', $type);
        $stmt1->bindValue(':date', $date);
        $stmt1->bindValue(':price', $price);
        $stmt1->bindValue(':quantity', $quantity);
        $stmt1->bindValue(':transid', $transid); 
        $stmt1->execute();
        $stmt1->closeCursor();

    }
    include('viewTransaction.php');    
}

if($type === "Buyer"){
    $tquant = $quantity + $quant['quantity'];

//var_dump($tquant);

    //update part quantity
    $sql2 = 'UPDATE parts SET quantity = :tquant WHERE partid = :partid';
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(':tquant', $tquant);
    $stmt2->bindValue(':partid', $partid);
    $stmt2->execute();
    $stmt2->closeCursor();
   
    //update transaction
    $sql3 = 'UPDATE transactions
        SET phoneid =:phoneid, partid =:partid, transtype =:type, price =:price, 
        date =:date, quantity =:quantity WHERE transid =:transid';
      
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->bindValue(':phoneid', $phoneid);
        $stmt3->bindValue(':partid', $partid);
        $stmt3->bindValue(':type', $type);
        $stmt3->bindValue(':date', $date);
        $stmt3->bindValue(':price', $price);
        $stmt3->bindValue(':quantity', $quantity);
        $stmt3->bindValue(':transid', $transid); 
        $stmt3->execute();
        $stmt3->closeCursor();
    
    

    include('viewTransaction.php');  
}  
?>