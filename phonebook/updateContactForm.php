<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$transid = filter_input(INPUT_POST, "transid", FILTER_VALIDATE_INT);


//Select parts 
$sql = "SELECT * FROM transaction WHERE transid = :transid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':transid', $transid);
$stmt->execute();
$tran = $stmt->fetch();
$stmt->closeCursor();

$sql1 = "SELECT * FROM parts ORDER BY partid";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$parts = $stmt1->fetchAll();
$stmt1->closeCursor();

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
        <div class="form-style-6">
      
        <h1>Modify Transaction</h1>
            <form action="updateTransaction.php" method="post">
            <h2>Please Select a Part</h2>
            <form action= "addTransactionForm.php" method = "post">
		    <select name = "partid">
            <option value="" disabled selected>Choose a part</option>
                <?php foreach($parts as $part) : ?>
			    <option value = "<?php echo $part['partid']; ?>">
			    <?php echo $part['itemname']; ?>
			    </option>
		    <?php endforeach ?>
		    </select>
            <select name = "custid">
            <option value="" disabled selected>Select Transaction Party</option>
                <?php foreach($contacts as $contact) : ?>
			    <option value = "<?php echo $contact['phoneid']; ?>">
			    <?php echo $contact['business'].' '.$contact['firstname'].' '.$contact['lastname']; ?>
			    </option>
		    <?php endforeach ?>
		    </select>
            <select name ="type" placeholder="Select Transaction Type">
            <option value="Buyer">Buyer</option>
            <option value="Seller">Seller</option>
            </select>
            <input type="text" name="price" placeholder="Price" />
            <input type="text" name="date" placeholder="Date mm/dd/yyyy" />
            <input type="text" name="quantity" placeholder="Quantity" />
            <input type="submit" value="Update Transaction" />
         </form>
        </div>
        

      <script src="js/scripts.js"></script>
   </body>
</html>