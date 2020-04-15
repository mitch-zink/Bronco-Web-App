<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($pbid)) {
	$pbid = filter_input(INPUT_POST, 'pbid', FILTER_VALIDATE_INT);
}

//Select parts 
$sql = "SELECT phonebook.phoneid, firstname, lastname, business, transid, transactions.phoneid, transtype, date, price, transactions.quantity, parts.partid, itemname 
         FROM phonebook, transactions, parts where phonebook.phoneid = transactions.phoneid AND transactions.partid = parts.partid AND transactions.phoneid = :pbid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':pbid', $pbid);
$stmt->execute();
$trans = $stmt->fetchAll();
$stmt->closeCursor();

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
      <div class="form-style-6" style="max-width:50%">
          <h1>View Transactions</h1>
            <table  align="center">
		        <tr>
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
                    <form action="transPart.php" method="post">
                    <input type="hidden" name="partid" value="<?php echo $tran['partid']; ?>">
                    <input type="submit" name="select" value="View Part">
                   </form></td>
                    </tr>
                    <?php } ?>
                    
                    </table> 
                    <input type="button" onclick="location.href='../parts/addTransactionForm.php';" value="Add New Transaction"/>     
      </div>
      
   </body>
</html>
