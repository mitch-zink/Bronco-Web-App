<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//fetch inputs
$projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
$partid = filter_input(INPUT_POST, "partid", FILTER_VALIDATE_INT);
$pquantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);

//var_dump($pquantity);
//Check Quantity
$sql = 'SELECT quantity FROM parts WHERE partid =:partid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$count = $stmt->fetch();
$stmt->closeCursor();

var_dump($count['quantity']);
$q = 0;

$q = $count['quantity'] - $pquantity;

//Compare inventory quantity to project parts request
if($q < 0){
    $error = "Error: Invalid inventory. Quantity exceeds inventory quantity on hand.";
    echo $error;
}

else{

//update part inventory
$sql1 = 'UPDATE parts
        SET quantity =:q WHERE partid =:partid';

$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(':q', $q);
$stmt1->bindValue(':partid', $partid);
$stmt1->execute();
$stmt1->closeCursor();

//Add project parts
$sql2 = 'INSERT INTO project_parts
    (partid, projectid, quantity)
  VALUES
    (:partid, :projectid, :quantity)';

$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':partid', $partid);
$stmt2->bindValue(':projectid', $projectid);
$stmt2->bindValue(':quantity', $pquantity);
$stmt2->execute();
$stmt2->closeCursor();

}

include('projectparts.php');



?>
