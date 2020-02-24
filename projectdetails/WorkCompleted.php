<?php
//connects to the database
require_once("../dbconnect.php");
include("../navbar.php"); 

$projid = filter_input(INPUT_POST, 'projid', FILTER_VALIDATE_INT);

$queryWork = "SELECT * FROM workcompleted
              WHERE projectid = :projectid
              ORDER BY dateperformed";
$stmt2 = $db->prepare($queryWork);
$stmt2->bindValue(':projectid', $projid);
$stmt2->execute();
$work = $stmt2->fetchAll();
$stmt2->closeCursor();

$queryProjectName = "SELECT projectname
                     FROM projects
                     WHERE projectid = :projectid";
$stmt3 = $db->prepare($queryProjectName);
$stmt3->bindValue(":projectid", $projid);
$stmt3->execute();
$projName = $stmt3->fetch();
$stmt3->closeCursor();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<h1 align="center">Work Completed</h1>

<div class="form-style-6">
  <h1><?php echo $projName['projectname']; ?></h1>
  <table>
    <tr>
      <th>Work Completed</th>
      <th>Date Completed</th>
      <th>Description</th>
    </tr>
  <?php foreach($work as $w){ ?>
    <tr>
      <td><?php echo $w['workname']; ?></td>
      <td><?php echo $w['dateperformed']; ?></td>
      <td><?php echo $w['workdesc']; ?></td>
    </tr>
  <?php } ?>
  </table>
<form action="addworkform.php" method="post">
  <input type="submit" value="Add Work Completed">
  <input type="hidden" name="projid" value="<?php echo $projid; ?>">
</form>
</div>
</body>
</html>
