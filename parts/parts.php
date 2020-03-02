<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Select parts 
$sql = "SELECT * FROM parts ORDER BY partid";
$stmt = $pdo->prepare($sql);
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
          <h1>View Parts</h1>
            <table>
		        <tr align="center">
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
            <input type="button" onclick="location.href='addPartsForm.php';" value="Add New Part"/>
	      </div>
         
      <script src="js/scripts.js"></script>
   </body>
</html>