<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Select parts 
$sql = "SELECT * FROM parts";
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
    <ul>
      <li style="float:left"><a href="#">Bronco</a>
      <li><a href="../home/home.php">Home</a></li>
      <li><a href="../home/homepage.php">Admin Home Page</a></li>
      <li><a href="../about/aboutus.php">About Us</a></li>
      <li><a href="../users/login.php">Login</a></li>
      <li><a class="active" href="#">Parts</a></li>
      <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
      <li><a href="../projects/projects.php">Projects</a></li>
    </ul>
    <ul>
      <li><a class="active" href="parts.php">View Parts</a></li>
      <li><a href="addPartsForm.php">Add Parts</a></li>
    </ul>
      <div class="form-style-6">
          <h1>View Parts</h1>
            <table>
		        <tr align="center">
                <th>Part Name</th>
                <th>Quantity</th>
                <th>Item Description</th>
                </tr>
		
                <?php foreach($parts as $part) {?> 
                    <tr>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $part['quantity']; ?></td>
                    <td><?php echo $part['itemdesc']; ?></td>		
                    
                    <td><form action="viewtransaction.php" method="post">
                    <input type="hidden" name="partid" value="<?php echo $part['partid']; ?>">
                    <input type="submit" name="select" value="View Transactions">
                    </form>
                    </tr>
                <?php }  ?>
            </table>
	      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>