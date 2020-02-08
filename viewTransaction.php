<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($partid)) {
	$partid = filter_input(INPUT_POST, 'partid', FILTER_VALIDATE_INT);
}

//Select parts 
$sql = "SELECT * FROM parts WHERE partid = :partid ORDER BY partid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$parts = $stmt->fetchAll();
$stmt->closeCursor();

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
where phonebook.phoneid = transaction.phoneid AND transid = :transid";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':transid', $transid);
$stmt2->execute();
$contacts = $stmt2->fetchAll();
$stmt2->closeCursor();

var_dump($contacts);
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css.css">
   </head>
   <body>
      <ul>
         <li style="float:left"><a href="#">Bronco</a>
         <li><a href="home.php">Home</a></li>
         <li><a href="homepage.php">Admin Home Page</a></li>
         <li><a href="aboutus.php">About Us</a></li>
         <li><a href="purpose.php">Purpose</a></li>
         <li><a href="faq.php">FAQ</a></li>
         <li><a href="createUA.php">Create User Account</a></li>
         <li><a href="login.php">Login</a></li>
         <li><a href="logout.php">Logout</a></li>
         <li><a href="parts.php">Parts</a></li>
         <li><a href="phonebook.php">Phonebook</a></li>
         <li><a href="projects.php">Projects</a></li>
         <li><a href="files.php">Files</a></li>
         <li><a href="WorkCompleted.php">Work Completed</a></li>
      </ul>
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
                   <?php foreach($parts as $part) { ?>
                        <?php foreach($contacts as $contact){ ?>
                    <tr>
                    <td><?php echo $tran['transid']; ?></td>
                    <td><?php echo $part['itemname']; ?></td>
                    <td><?php echo $tran['transtype']; ?></td>
                    <td><?php echo $contact['firstname'].' '.$contact['lastname'].$contact['business'];?></td>
                    <td><?php echo $tran['price']; ?></td>>
                    <td><?php echo $tran['date']; ?></td>
                    <td><?php echo $tran['quantity']; ?></td>		
                     <?php } } }?>
                    <td><form action="viewContact.php" method="post">
                    <input type="hidden" name="transid" value="<?php echo $trans['transid']; ?>">
                    <input type="submit" name="select" value="View Contact">
                    </form>
                    </tr>
               
            </table>
	      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>