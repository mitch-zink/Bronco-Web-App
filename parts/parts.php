<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($partfamily)) {
   $partfamily = filter_input(INPUT_POST, "partfamily");
}

//Select parts 
$sql1 = "SELECT * FROM parts WHERE partfamily =:partfamily ORDER BY partid";
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(":partfamily", $partfamily);
$stmt1->execute();
$parts = $stmt1->fetchAll();
$stmt1->closeCursor();
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
         <form action= "parts.php" method = "post" >
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
         
		<input type="submit" name="select" value="Get Parts List">
      </form>
   </div>
   <br><br>
   <?php if(isset($partfamily)) { ?>   
      <div class="form-style-6">
          <h1>View Parts</h1>
            <table>
		        <tr>
              <th>Part ID</th>
                <th>Part Name</th>
                <th>Item Description</th>
                <th>Part Family</th>
                <th>Quantity</th>
                <th>Comments</th>
                <th>Options</th>
               </tr>
		
                <?php foreach($parts as $part) {?> 
                    <tr>
                    <td><?php echo $part['partid']; ?></td>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $part['itemdesc']; ?></td>
                    <td><?php echo $part['partfamily']; ?></td>
                    <td><?php echo $part['quantity']; ?></td>
                    <td><?php echo $part['comments']; ?></td>
                                   
                    <td><form action="viewtransaction.php" method="post">
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <input type="submit" name="select" value="View Transactions">
                    </form>
                    <form action="UpdatePartsForm.php" method="post">
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <input type="submit" name="select" value="Edit Part Information">
                    </form>
                    </tr>
                <?php }  ?>
            </table>

	      </div>
   <?php } ?>
      <script src="js/scripts.js"></script>
   </body>
</html>