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
//print_r($contact['firstname']);
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
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $contact['firstname'] ?>" pattern="[a-zA-Z]{2,}" title="Enter minimum 2 letters" required>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $contact['lastname'] ?>" pattern="[a-zA-Z ']{2,}" title="Enter minimum 2 letters">
            <input type="text" name="business" placeholder="Business Name" value="<?php echo $contact['business'] ?>" pattern="[a-zA-Z0-9 ']{2,}" title="Enter minimum 2 letters or numbers">
            <input type="text" name="addr1" placeholder="Address Line 1" value="<?php echo $contact['addr1'] ?>"  pattern="[a-zA-Z0-9 ']{2,}" title="Enter minimum 2 letters or numbers">
            <input type="text" name="addr2" placeholder="Address Line 2" value="<?php echo $contact['addr2'] ?>"  pattern="[a-zA-Z0-9 ']{2,}" title="Enter minimum 2 letters or numbers">
            <input type="text" name="city" placeholder="City" value="<?php echo $contact['city'] ?>" pattern="[a-zA-Z ']{2,}" title="Enter minimum 2 letters">
            <input type="text" name="state" placeholder="State" value="<?php echo $contact['state'] ?>" pattern="[A-Z]{2}" title="Enter 2 Upper Case Char State Abrev">
            <input type="text" name="zip" placeholder="Zip Code" value="<?php echo $contact['zip'] ?>" pattern="[0-9]{5}" title="Enter 5 digits">
            <input type="text" name="email" placeholder="Email Address" value="<?php echo $contact['emailaddress'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Not a proper email address">
            <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $contact['phonenumber'] ?>"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Enter with dashes"/>
            <input type="hidden" name="phoneid" value="<?php echo $phoneid ?>">
            <input type="submit" value="Submit Changes">
         </form>
        </div>
        

      
   </body>
</html>