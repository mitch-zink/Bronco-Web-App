<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//fetch inputs
$projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
$partid = filter_input(INPUT_POST, "partid", FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);

//Check Quantity
$sql = "SELECT quantity FROM parts WHERE partid = :partid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":partid", $partid);
$stmt->execute();
$count = $stmt->fetch();
$stmt->closeCursor();

/*if($count < $quantity){
    $error = "Error: Invalid inventory. Quantity exceeds inventory quantity on hand.";
    echo $error;
}
else{*/
    
$sql = 'INSERT INTO project_parts
    (partid, projectid, quantity)
  VALUES
    (:partid, :projectid, :quantity)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->bindValue(':projectid', $projectid);
$stmt->bindValue(':quantity', $quantity);
$stmt->execute();
$stmt->closeCursor();

// Go to index.php
// echo "Part Added!";
include('projectparts.php');



?>
