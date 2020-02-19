<?php
//connects to the database
require_once("../dbconnect.php");
include("../navbar.php"); 

$action = filter_input(INPUT_POST, 'action');
$projectid = filter_input(INPUT_POST, 'projectid', FILTER_VALIDATE_INT);

$queryProjects = "SELECT * FROM projects
                  ORDER BY projectid";
$stmt1 = $db->prepare($queryProjects);
$stmt1->execute();
$projects = $stmt1->fetchAll();
$stmt1->closeCursor();

$queryWork = "SELECT * FROM workcompleted
              WHERE projectid = :projectid
              ORDER BY dateperformed";
$stmt2 = $db->prepare($queryWork);
$stmt2->bindValue(':projectid', $projectid);
$stmt2->execute();
$work = $stmt2->fetchAll();
$stmt2->closeCursor();

$queryProjectName = "SELECT projectname
                     FROM projects
                     WHERE projectid = :projectid";
$stmt3 = $db->prepare($queryProjectName);
$stmt3->bindValue(":projectid", $projectid);
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

<?php if($action != 'View Report'){ ?>

<div class="form-style-6">
  <form method="post">
    <h1>Select Project</h1>
    <select id="projects" name="projectid">
    <?php foreach($projects as $project){ ?>
      <option value="<?php echo $project['projectid'] ?>"><?php echo $project['projectname'] ?></option>
    <?php } ?>
    </select>
    <input type="submit" name="action" value="View Report">
  </form>
</div>
<?php }else{ ?>

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
<form action="WorkCompleted.php" align="center">
  <input type="submit" value="Back">
</form>
</div>

<?php } ?>
</body>
</html>
