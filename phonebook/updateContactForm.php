<?php
require("../dbconnect.php");

$phoneid = filter_input(INPUT_POST, "phoneid");

//Select phonebook info
$sql = "SELECT * FROM phonebook
        WHERE phoneID = :phoneid";
$stmt = $db->prepare($sql);
$stmt->bindValue(":phoneid", $phoneid);
$stmt->execute();
$contact = $stmt->fetch();
$stmt->closeCursor();
print_r($contact['firstname']);
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
        <h1>Update Contact</h1>
          <form action="updateContact.php" method="post">
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $contact['firstname'] ?>">
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $contact['lastname'] ?>">
            <input type="text" name="business" placeholder="Business Name" value="<?php echo $contact['business'] ?>">
            <input type="text" name="addr1" placeholder="Address Line 1" value="<?php echo $contact['addr1'] ?>">
            <input type="text" name="addr2" placeholder="Address Line 2" value="<?php echo $contact['addr2'] ?>">
            <input type="text" name="city" placeholder="City" value="<?php echo $contact['city'] ?>">
            <input type="text" name="state" placeholder="State" value="<?php echo $contact['state'] ?>">
            <input type="text" name="zip" placeholder="Zip Code" value="<?php echo $contact['zip'] ?>">
            <input type="text" name="email" placeholder="Email Address" value="<?php echo $contact['emailaddress'] ?>">
            <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $contact['phonenumber'] ?>">
            <input type="hidden" name="phoneid" value="<?php echo $phoneid ?>">
            <input type="submit" value="Submit Changes">
         </form>
        </div>
        

      <script src="js/scripts.js"></script>
   </body>
</html>