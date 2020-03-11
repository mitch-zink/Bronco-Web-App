<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($partid)) {
    $partid = filter_input(INPUT_POST, "partid", FILTER_VALIDATE_INT);
}
var_dump($partid);

//Select parts 
$sql = "SELECT * FROM parts ORDER BY partid";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$parts = $stmt->fetchAll();
$stmt->closeCursor();

//Select phonebook info
$sql2 = "SELECT * FROM phonebook ORDER BY phoneid";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$contacts = $stmt2->fetchAll();
$stmt2->closeCursor();

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
       <h1>Add Transaction</h1>
      <div class="form-style-6">
      
            <h1>Please Select a Part</h1>
            <form action= "addTransactionForm.php" method = "post">
		    <select name = "partid">
            <option value="" disabled selected>Choose a part</option>
                <?php foreach($parts as $part) : ?>
			    <option value = "<?php echo $part['partid']; ?>">
			    <?php echo $part['itemname']; ?>
			    </option>
		    <?php endforeach ?>
		    </select>
		    <input type="submit" name="select" value="Select">
            </form><br>	
    </div>
    <?php if(isset($partid)) { ?>
    <div class="form-style-6">
        
            <h1>Enter Transaction Details</h1>
            <form action="addTransaction.php" method="post">
            <select name = "phoneid">
            <option value="" disabled selected>Select Transaction Party</option>
                <?php foreach($contacts as $contact) : ?>
			    <option value = "<?php echo $contact['phoneid']; ?>">
			    <?php echo $contact['business'].' '.$contact['firstname'].' '.$contact['lastname']; ?>
			    </option>
		    <?php endforeach ?>
		    </select>
            <input type="button" onclick="location.href='../phonebook/addContactForm.php';" value="Add New Contact"/>
            <br><br>
            <select name ="type" placeholder="Select Transaction Type">
            <option value="Buyer">Buyer</option>
            <option value="Seller">Seller</option>
            </select>
            <input type="text" name="price" placeholder="Price" pattern='^\d+(?:\.\d{0,2})$' title="Include 2 decimal points"/>
            <input type="date" name="date" placeholder="Date mm/dd/yyyy" />
            <input type="text" name="quantity" placeholder="Quantity" pattern="[0-9]{1,}" maxlength="4" title="Max 4 numbers allowed" />
            <input type="hidden" name="partid" value="<?php echo $partid; ?>">
            <input type="submit" value="Enter Transaction" />
         </form>
                <?php } ?>
      </div>
      
      <script src="js/scripts.js"></script>
   </body>
</html>