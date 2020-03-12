<?php
require_once("../dbconnect.php");
require_once("../navbar.php");

$projid = filter_input(INPUT_POST, "projid");

// Runs a query to for selected project
$queryProject = "SELECT * FROM projects
                 WHERE projectid = :projid";
$stmt2 = $db->prepare($queryProject);
$stmt2->bindValue(":projid", $projid);
$stmt2->execute();
$selectedproject = $stmt2->fetchAll();
$stmt2->closeCursor();

?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="../css.css">
   </head>
   <body>
      <div class="form-style-6">
         <h1><?php echo $selectedproject[0]["projectname"]; ?></h1>
         <form action="updateproject.php" method="post">
            <?php foreach ($selectedproject as $project): ?>
                       
            <label for="projectid">Project Name</label>
            <input type="text"   name="projectname" placeholder="projectname" value="<?php echo $project["projectname"];?>" pattern="[a-zA-Z0-9,.- ']{2,}"  maxlength="15" title="Only 15 letters & numbers allowed" />
            
            <label for="projectid">Make</label>
            <input type="text"   name="make" placeholder="make" value="<?php echo $project["make"];?>"  pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            
            <label for="projectid">Model</label>
            <input type="text"   name="model" placeholder="model" value="<?php echo $project["model"];?>"  pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            
            <label for="projectid">Trim Package</label>
            <input type="text"   name="trim_pkg" placeholder="trim_pkg" value="<?php echo $project["trim_pkg"];?>"  pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            
            <label for="projectid">Project Description</label>
            <input type="text"   name="projectdesc" placeholder="projectdesc" value="<?php echo $project["projectdesc"];?>"  pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" />
           
            <label for="projectid">Purchase Date</label>
            <input type="text"   name="purchdate" placeholder="purchdate" value="<?php echo $project["purchdate"];?>" />
          
            <label for="projectid">Purchase Price</label>
            <input type="text"   name="purchprice" placeholder="purchprice" value="<?php echo $project["purchprice"];?>" pattern='^\d+(?:\.\d{0,2})$' title="Only numbers allowed - Include 2 decimal points" />
            
            <label for="projectid">Sell Price</label>
            <input type="text"   name="sellprice" placeholder="sellprice" value="<?php echo $project["sellprice"];?>" pattern='^\d+(?:\.\d{0,2})$' title="Only numbers allowed - Include 2 decimal points" />
          
            <label for="projectid">Sell Date</label>
           <input type="text"   name="selldate" placeholder="selldate" value="<?php echo $project["selldate"];?>" />
            
           <label for="projectid">Project Comments</label>
            <input type="text"   name="projectcomments" placeholder="projectcomments" value="<?php echo $project["projectcomments"];?>"  pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" />
            <input type="hidden" name="projid" value="<?php echo $projid;?>" />
            <input type="submit" name="action" value="Submit">


            <?php endforeach;?>

         </form>
      </div>
   </body>
</html>