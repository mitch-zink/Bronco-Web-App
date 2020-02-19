<?php
//Connects to the MySQL database using the PDO extension
require("../dbconnect.php");


//Select Contact
$sql = "SELECT * FROM phonebook ORDER BY phoneid";
$stmt = $db->prepare($sql);
$stmt->execute();
$phones = $stmt->fetchAll();
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
          <h1>View Phonebook Contact</h1>
            <table>
		        <tr align="center">
                <th>Phone ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Business</th>
                <th>Address</th>
                <th>Address cont.</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                </tr>
		
                <?php foreach($phones as $phone) {?>
                    <tr>
                    <td><?php echo $phone['phoneid']; ?></td>
                    <td><?php echo $phone['firstname']; ?></td>
                    <td><?php echo $phone['lastname']; ?></td>
                    <td><?php echo $phone['business']; ?></td>
                    <td><?php echo $phone['addr1']; ?></td>
                    <td><?php echo $phone['addr2']; ?></td>
                    <td><?php echo $phone['city']; ?></td>
                    <td><?php echo $phone['state']; ?></td>
                    <td><?php echo $phone['zip']; ?></td>
                    <td><?php echo $phone['emailaddress']; ?></td>
                    <td><?php echo $phone['phonenumber']; ?></td>
                       
                    <td><form action="updateContactForm.php" method="post">
                    <input type="hidden" name="phoneid" value="<?php echo $phone['phoneid']; ?>">
                    <input type="submit" name="select" value="Modify Contact">
                    </form>
                    </td>
                    </tr> 
                    <?php } ?>  </table>  
                    <input type="button" onclick="location.href='addContactForm.php';" value="Add New Contact"/>     
      </div>
      

      <script src="js/scripts.js"></script>
   </body>
</html>

