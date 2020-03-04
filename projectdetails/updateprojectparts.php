<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$projectid = filter_input(INPUT_POST, "projectid");
$partid = filter_input(INPUT_POST, "partid");
$pquantity = filter_input(INPUT_POST, "pquantity");

//var_dump($pquantity);

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

$sql1 = 'UPDATE project_parts
        SET quantity =:pquantity WHERE partid =:partid AND projectid =:projectid';

$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(':pquantity', $pquantity);
$stmt1->bindValue(':partid', $partid);
$stmt1->bindValue(':projectid', $projectid);


$stmt1->execute();
$stmt1->closeCursor();    
}
include('projectparts.php');
?>