<?php
//connects to the database
require_once("../dbconnect.php");
include("../navbar.php"); 

$projid = filter_input(INPUT_POST, 'projid', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_POST, 'action');

$queryProjects = 'SELECT * FROM projects
                  ORDER BY projectname asc';
$stmt = $db->prepare($queryProjects);
$stmt->execute();
$projects = $stmt->fetchAll();
$stmt->closeCursor();

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

<?php if($action != "Submit"){ ?>
<div class="form-style-6">
<h1>Select a Project</h1>
  <form action="#" name="DDL" method="post">
    <select name="projid">
        <option value="" disabled selected>Please Select a Project</option>
        <?php foreach($projects as $project){ ?>
        <option value="<?php echo $project['projectid']; ?>"><?php echo $project['projectname']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="action" value="Submit">
  </form>
</div>

<?php }else{ ?>

<div class="form-style-6" style="max-width:30%">
  <h1><?php echo $projName['projectname']; ?></h1>
  <table align="center">
    <tr>
      <th>Work Completed</th>
      <th>Date Completed</th>
      <th>Description</th>
      <th>&nbsp</th>
    </tr>
  <?php foreach($work as $w){ ?>
    <tr>
      <td><?php echo $w['workname']; ?></td>
      <td><?php echo $w['dateperformed']; ?></td>
      <td><?php echo $w['workdesc']; ?></td>
      <td>
        <form action="updateworkform.php" method="post">
          <input type="hidden" name="projid" value="<?php echo $projid ?>">
          <input type="hidden" name="workid" value="<?php echo $w['workid']; ?>">
          <input type="submit" value="Update Work Completed">
        </form>
      </td>
    </tr>
  <?php } ?>
  </table>
  
  <div class="form-style-6">
  <form action="addworkform.php" method="post">
  <input type="submit" value="Add Work Completed">
  <input type="hidden" name="projid" value="<?php echo $projid; ?>">
</form>
</div>
<?php } ?>
</body>
</html>
