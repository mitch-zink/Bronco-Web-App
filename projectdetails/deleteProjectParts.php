<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$projectid = filter_input(INPUT_POST, "projectid");
$partid = filter_input(INPUT_POST, "partid");
$pquantity = filter_input(INPUT_POST, "pquantity");

$sql = 'SELECT quantity FROM parts 
WHERE partid =:partid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$count = $stmt->fetch();
$stmt->closeCursor();

$q = $pquantity + $count['quantity'];

$sql2 = 'UPDATE parts
        SET quantity =:q WHERE partid =:partid';

$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':q', $q);
$stmt2->bindValue(':partid', $partid);
$stmt2->execute();
$stmt2->closeCursor();

$sql = 'DELETE FROM project_parts WHERE partid = :partid AND projectid = :projectid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->bindValue(':projectid', $projectid);
$stmt->execute();
$stmt->closeCursor();

include('projectParts.php');
?>