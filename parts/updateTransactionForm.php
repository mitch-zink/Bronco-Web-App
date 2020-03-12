<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

$transid = filter_input(INPUT_POST, "transid", FILTER_VALIDATE_INT);


//Select parts 
$sql = "SELECT * FROM transactions WHERE transid = :transid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':transid', $transid);
$stmt->execute();
$tran = $stmt->fetch();
$stmt->closeCursor();

$sql1 = "SELECT itemname FROM parts WHERE partid = :partid";
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(":partid", $tran["partid"]);
$stmt1->execute();
$part = $stmt1->fetch();
$stmt1->closeCursor();

//Select phonebook info
$sql2 = "SELECT * FROM phonebook ORDER BY phoneid";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$contacts = $stmt2->fetchAll();
$stmt2->closeCursor();
print_r($contacts);
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
      
        <h1>Modify Transaction For: <?php echo $part['itemname']; ?></h1>
            <form action="updateTransaction.php" method="post">
            <select name = "phoneid">
            <option value="" disabled selected>Select Contact</option>
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
            <input type="text" name="price"  value="<?php echo $tran['price']; ?>" />
            <input type="text" name="date" value="<?php echo $tran['date']; ?>" />
            <input type="text" name="quantity" value="<?php echo $tran['quantity']; ?>" />
            <input type="hidden" name="transid" value="<?php echo $transid; ?>"/>
            <input type="hidden" name="partid" value="<?php echo $tran['partid']; ?>"/>
            <input type="submit" value="Update Transaction" />
         </form>
        </div>
        
      <script src="js/scripts.js"></script>
   </body>
</html>