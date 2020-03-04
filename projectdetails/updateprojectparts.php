<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$projectid = filter_input(INPUT_POST, "projectid");
$partid = filter_input(INPUT_POST, "partid");
$pquantity = filter_input(INPUT_POST, "pquantity");


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
$sql1 = 'UPDATE project_parts
        SET quantity =:pquantity WHERE partid =:partid AND projectid =:projectid';

$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(':pquantity', $pquantity);
$stmt1->bindValue(':partid', $partid);
$stmt1->bindValue(':projectid', $projectid);


$stmt1->execute();
$stmt1->closeCursor();    

include('projectparts.php');
?>