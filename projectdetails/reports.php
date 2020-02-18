<?php
require('../dbconnect.php');
include("../navbar.php");

$projselect = filter_input(INPUT_POST, "projselect");
$projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);

$queryProjects = "SELECT * FROM projects
                  ORDER BY projectid";
$stmt1 = $db->prepare($queryProjects);
$stmt1->execute();
$projects = $stmt1->fetchAll();
$stmt1->closeCursor();

$queryProject = "SELECT * FROM projects
                 WHERE projectid = :projectid";
$stmt2 = $db->prepare($queryProject);
$stmt2->bindValue('projectid', $projectid);
$stmt2->execute();
$selectProject = $stmt2->fetchAll();
$stmt2->closeCursor();

//gets all parts used within a project, and the price spent on said parts
$queryParts = "SELECT price FROM transactions, project_parts
               WHERE project_parts.projectid = :projectid
               AND transactions.partid = project_parts.partid";
$stmt3 = $db->prepare($queryParts);
$stmt3->bindValue(':projectid', $projectid);
$stmt3->execute();
$parts = $stmt3->fetchAll();
$stmt3->closeCursor();

//calculates total spent on parts for a project
$partCosts = 0;
foreach($parts as $part){
  $partCosts += $part['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>

<h1>View Reports</h1>

<?php if($projselect != "View Report") { ?>
<div class="form-style-6">
  <form method="post">
    <h1>Select Project</h1>
    <select id="projects" name="projectid">
    <?php foreach($projects as $project){ ?>
      <option value="<?php echo $project['projectid'] ?>"><?php echo $project['projectname'] ?></option>
    <?php } ?>
    </select>
    <input type="submit" name="projselect" value="View Report">
  </form>
</div>

<?php } else { foreach($selectProject as $detail){  ?>
<div class="form-style-6">
  <h1><?php echo $detail['projectname']; ?></h1>
  <table align="center">
    <tr>
      <th>Purchase Price</th>
      <th>Investment Costs</th>
    </tr>
    <tr>
      <td>$<?php echo $detail['purchprice']; ?></td>
      <td>$<?php echo $partCosts; ?></td>
    </tr>
  </table>
<?php } }?>

</body>
</html>
