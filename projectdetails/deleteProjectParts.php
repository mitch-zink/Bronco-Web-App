<?php 
 
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$projectid = filter_input(INPUT_POST, "projectid");
$partid = filter_input(INPUT_POST, "partid");

$sql = 'DELETE FROM project_parts WHERE partid = :partid AND projectid = :projectid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->bindValue(':projectid', $projectid);
$stmt->execute();
$count = $stmt->fetch();
$stmt->closeCursor();

include('projectParts.php');
?>