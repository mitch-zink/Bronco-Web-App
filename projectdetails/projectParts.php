<?php 

//Connect to DB
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');


if(!isset($projectid)) {
    $projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
}

//var_dump($projectid);
//Get Project data
$sql = 'SELECT * FROM projects
                  ORDER BY projectname asc';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$projects = $stmt->fetchAll();
$stmt->closeCursor();  

//Select project parts 
$sql1 = 'SELECT project_parts.projectid, project_parts.partid, project_parts.quantity,
    parts.partid, parts.itemname, parts.itemdesc, parts.partfamily from project_parts, parts where project_parts.projectid = :projectid
        and project_parts.partid = parts.partid';
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(':projectid', $projectid);
$stmt1->execute();
$parts = $stmt1->fetchAll();
$stmt1->closeCursor();

$sql2 = 'SELECT projectname
        FROM projects
        WHERE projectid = :projectid';
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':projectid', $projectid);
$stmt2->execute();
$projname = $stmt2->fetch();
$stmt2->closeCursor();

?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="../css.css">
   </head>
   <body>
   <?php
include("../navbar.php")
?>
      <div class="form-style-6">
      <h1>Manage Project Parts</h1>
        <h2>Select a project to continue</h2>
         <form action="#" method="post">
            <select name="projectid">
               <option value="" disabled selected>Please Select a Project</option>
               <?php foreach($projects as $project){ ?>
                <option value="<?php echo $project['projectid']; ?>"><?php echo $project['projectname']; ?></option>
               <?php } ?>
            </select>
            <input type="submit" name="action" value="View Parts">
         </form>
      </div>
      <br><br>
   <?php if(isset($projectid)) { ?>   
      <div class="form-style-6" style="max-width:45%">
          <h1>View Parts for <?php echo $projname[0]; ?></h1>
          <table align="center">
             <tr>
                <th>Part Name</th>
                <th>Item Description</th>
                <th>Part Family</th>
                <th>Quantity Used</th>
                </tr>
		
                <?php foreach($parts as $part) {?> 
                    
                    <tr>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $part['itemdesc']; ?></td>
                    <td><?php echo $part['partfamily']; ?></td>
                   <form action="updateProjectParts.php" method="post">
                    <td><input type="text" name="pquantity" value="<?php echo $part['quantity']; ?>"/>
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <input type="hidden" name="projectid" value="<?php echo $part['projectid']; ?>">
                    <input type="submit" name="select" value="Update Quantity"></td>
                    
                    </form>
                    <td>
                    <form action="deleteProjectParts.php" method="post">
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <input type="hidden" name="projectid" value="<?php echo $part['projectid']; ?>">
                    <input type="hidden" name="pquantity" value="<?php echo $part['quantity']; ?>"/>
                    <input type="submit" name="select" value="Remove Part">
                    </form>
                    </td>
                    
                    <?php } ?>
                     </tr>
                
            </table>
            <div class="form-style-6">
            <form action="addProjectPartsForm.php" method="post">
                    <input type="hidden" name="projectid" value="<?php echo $projectid; ?>">
                    <input type="submit" name="select" value="Add Parts to Project">
            </form>
	      </div>
   <?php } ?>
   </body>
</html>