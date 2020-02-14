<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Select parts 
$sql = "SELECT * FROM phonebook";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$contacts = $stmt->fetchAll();
$stmt->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>

<ul>
  <li style="float:left"><a href="#">Bronco</a>
  <li><a href="../home/home.php">Home</a></li>
  <li><a href="../home/homepage.php">Admin Home Page</a></li>
  <li><a href="../about/aboutus.php">About Us</a></li>
  <li><a href="../users/login.php">Login</a></li>
  <li><a href="../parts/parts.php">Parts</a></li>
  <li><a class="active" href="#">Phonebook</a></li>
  <li><a href="../projects/projects.php">Projects</a></li>
</ul>
<ul>
  <li><a class="active" href="#">View Contacts</a></li>
  <li><a href="addContactForm.php">Add Contact</a></li>
</ul>

<div class="form-style-6">
  <h1>View Contacts</h1>
    <table>
    <tr align="center">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        </tr>

        <?php foreach($contacts as $contact) {?> 
            <tr>
            <td><?php echo $contact['firstname']; ?></td>
            <td><?php echo $contact['lastname']; ?></td>
            <td><?php echo $contact['addr1']; ?></td>
            <td><?php echo $contact['city']; ?></td>
            <td><?php echo $contact['state']; ?></td>
            <td><?php echo $contact['zip']; ?></td>
            <td><?php echo $contact['emailaddress']; ?></td>
            <td><?php echo $contact['phonenumber']; ?></td>
            </tr>
        <?php }  ?>
    </table>
</div>

</body>
</html>
