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
      <div class="form-style-6" style="max-width:85%">
          <h1>View Contacts</h1>
            <table align="center">
		        <tr>
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
                <th>Options</th>
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
                    <form action="viewTransaction.php" method="post">
                    <input type="hidden" name="pbid" value="<?php echo $phone['phoneid']; ?>">
                    <input type="submit" name="select" value="View Transactions">
                    </form>
                    </tr> 
                    <?php } ?>   
                    </table> 
                    <div class="form-style-6">
                    <input type="button" onclick="location.href='addContactform.php';" value="Add New Contact"/>
 
      </div>
      

      
   </body>
</html>

