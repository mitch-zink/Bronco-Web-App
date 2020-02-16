<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($partid)) {
	$partid = filter_input(INPUT_POST, 'partid', FILTER_VALIDATE_INT);
}

//Select parts 
$sql = "SELECT phonebook.phoneid, firstname, lastname, business, transid, transaction.phoneid, transtype, date, price, transaction.quantity, parts.partid, itemname 
         FROM phonebook, transaction, parts where phonebook.phoneid = transaction.phoneid AND transaction.partid = parts.partid AND transaction.partid = :partid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$trans = $stmt->fetchAll();
$stmt->closeCursor();

/*$partname = '';
foreach($parts as $part) {
   $partname = $part['itemname']
}
//Select transactions
$sql1 = "SELECT * FROM transaction WHERE partid = :partid ORDER BY partid";
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindValue(':partid', $partid);
$stmt1->execute();
$trans = $stmt1->fetchAll();
$stmt1->closeCursor();

//Store transaction ID for use
$transid = '';
foreach($trans as $tran){
    $transid = $tran['transid'];
}
var_dump($transid);

//Select phonebook contact info from matching transaction
$sql2 = "SELECT phonebook.phoneid, firstname, lastname, business, transaction.phoneid FROM phonebook, transaction
where phonebook.phoneid = transaction.phoneid";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':transid', $transid);
$stmt2->execute();
$contacts = $stmt2->fetchAll();
$stmt2->closeCursor();

var_dump($contacts); */
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
          <h1>View Transactions</h1>
            <table>
		        <tr align="center">
                <th>Transaction ID</th>
                <th>Part Name</th>
                <th>Transaction Type</th>
                <th>Transaction Party</th>
                <th>Price</th>
                <th>Date</th>
                <th>Quantity</th>
                </tr>
		
                <?php foreach($trans as $tran) {?>
                    <tr>
                    <td><?php echo $tran['transid']; ?></td>
                    <td><?php echo $tran['itemname']; ?></td>
                    <td><?php echo $tran['transtype']; ?></td>
                    <td><?php echo $tran['firstname'].' '.$tran['lastname'].$tran['business'];?></td>
                    <td><?php echo $tran['price']; ?></td>
                    <td><?php echo $tran['date']; ?></td>
                    <td><?php echo $tran['quantity']; ?></td>		
                     
                    <td> <form action="UpdateTransactionForm.php" method="post">
                    <input type="hidden" name="transid" value="<?php echo $tran['transid']; ?>">
                    <input type="submit" name="select" value="Edit Transaction Information">
                    </form>
                    <form action="viewContact.php" method="post">
                    <input type="hidden" name="phoneid" value="<?php echo $tran['phoneid']; ?>">
                    <input type="submit" name="select" value="View Contact">
                    </tr><?php } ?>
                    </form>
                    </table> 
                    <input type="button" onclick="location.href='addTransactionForm.php';" value="Add New Transaction"/>     
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>

