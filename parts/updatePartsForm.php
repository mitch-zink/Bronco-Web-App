<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

if(!isset($partid)) {
    $partid = filter_input(INPUT_POST, "partid", FILTER_VALIDATE_INT);
}

//Select parts 
$sql = "SELECT * FROM parts WHERE partid = :partid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':partid', $partid);
$stmt->execute();
$part = $stmt->fetch();
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
      <h1>Modify Parts</h1>
      <div class="form-style-6">
      
        <h1>Modify Part: <?php echo $part['itemname']; ?></h1>
            <form action="updateParts.php" method="post">
            <input type="text" name="itemname" value="<?php echo $part['itemname']; ?>" />
            <input type="text" name="itemdesc" value="<?php echo $part['itemdesc']; ?>" />
            <input type="text" name="quantity" value="<?php echo $part['quantity']; ?>" />
            <input type="text" name="comments" value="<?php echo $part['comments']; ?>" />
            <input type="hidden" name="partid" value="<?php echo $partid; ?>">
            <input type="submit" value="Update Transaction" />
         </form>
         
      </div>

      <script src="js/scripts.js"></script>
   </body>
</html>