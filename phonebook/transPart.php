<?php
//Connects to the MySQL database using the PDO extension
require("../dbconnect.php");

if(!isset($partid)) {
	$partid = filter_input(INPUT_POST, 'partid', FILTER_VALIDATE_INT);
}

//Select Contact
$sql = "SELECT * FROM parts WHERE partid = :partid";
$stmt = $db->prepare($sql);
$stmt->bindValue(':partid', $partid);
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
   <?php include("../navbar.php"); ?>
      <div class="form-style-6">
      <h1>View Part</h1>
            <table>
		        <tr>
                <th>Part ID</th>
                <th>Part Name</th>
                <th>Item Description</th>
                <th>Part Family</th>
                <th>Quantity</th>
                <th>Comments</th>
                </tr>
		
                <?php foreach($parts as $part) {?> 
                    <tr>
                    <td><?php echo $part['partid']; ?></td>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $part['itemdesc']; ?></td>
                    <td><?php echo $part['partfamily']; ?></td>
                    <td><?php echo $part['quantity']; ?></td>
                    <td><?php echo $part['comments']; ?></td>
                                   
                    </tr>
                <?php }  ?>
            </table>
            <input type="button" onclick="location.href='../parts/parts.php';" value="View Parts Inventory"/>

	      </div>
   
      
   </body>
</html>