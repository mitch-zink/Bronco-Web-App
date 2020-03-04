<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
$projid = filter_input(INPUT_POST, "projid", FILTER_VALIDATE_INT); 

var_dump($projectid);

if(!isset($partfamily)) {
   $partfamily = filter_input(INPUT_POST, "partfamily");
}


//Select parts 
$sql = "SELECT * FROM parts WHERE partfamily =:partfamily ORDER BY partid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":partfamily", $partfamily);
$stmt->execute();
$parts = $stmt->fetchAll();
$stmt->closeCursor();
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
      <h1>Please Select Part Family</h1>
         <form action= "#" method = "post" >
            <select id="partfamily" name="partfamily">
            <option value="" disabled selected>Please Select Part Family</option>
               <option value="body">Body</option>
               <option value="brakes">Brakes</option>
               <option value="coolingsystem">Cooling System</option>
               <option value="drivetrain">Drive Train</option>
               <option value="electrical">Electrical</option>
               <option value="engine">Engine</option>
               <option value="exhaust">Exhaust</option>
               <option value="interior">Interior</option>
               <option value="suspension">Suspension</option>      
            </select>
        <input type="hidden" name="projid" value="<?php echo $projectid; ?>" /> 
		<input type="submit" name="select" value="Get Parts List">
      </form>
   </div>
   <br><br>
   <div class="form-style-6">
   <?php if(isset($partfamily)) { ?>   
          <h1>Add Part to Project:<?php echo $projid;?></h1>
            <form action="addProjectParts.php" method="post">
            <table>
		    <tr align="center">
                <th>Part Name</th>
                <th>Item Description</th>
                <th>Enter Quantity</th>
                </tr>
		
                <?php foreach($parts as $part) {?> 
                    <tr>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $part['itemdesc']; ?></td>
                    <td><input type="text" name="quantity" value="<?php echo $part['quantity']; ?>"/></td>
                    <input type="hidden" name="projectid" value="<?php echo $projid; ?>">
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <td><input type="submit" name="select" value="Add Part"></td>
                     </tr>
                     </form>
                   
                <?php }  ?>
            </table>
            
	      </div>
   <?php } ?>
      <script src="js/scripts.js"></script>
   </body>
</html>