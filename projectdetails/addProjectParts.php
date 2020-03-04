<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//fetch inputs
$projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
$partid = filter_input(INPUT_POST, "partid", FILTER_VALIDATE_INT);
$pquantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);

//validation

//var_dump($pquantity);
//Check Quantity
$sql = 'SELECT quantity FROM parts 
WHERE partid =:partid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$count = $stmt->fetchColumn();
$stmt->closeCursor();

//var_dump($count);
$q = '';
if($pquantity > $count){
    $error = "Error: Invalid inventory. Quantity exceeds inventory quantity on hand.";
    echo $error;
}
//***Bug - Need to figure out how to adjust quantity counts for parts and project_parts properly when updated. Ryan 3/4
else{
$q = $count - $pquantity;

$sql2 = 'UPDATE parts
        SET quantity =:q WHERE partid =:partid';

$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':q', $q);
$stmt2->bindValue(':partid', $partid);
$stmt2->execute();
$stmt2->closeCursor();
    
$sql = 'INSERT INTO project_parts
    (partid, projectid, quantity)
  VALUES
    (:partid, :projectid, :quantity)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->bindValue(':projectid', $projectid);
$stmt->bindValue(':quantity', $pquantity);
$stmt->execute();
$stmt->closeCursor();
}
// Go to index.php
// echo "Part Added!";
include('projectparts.php');



?>
