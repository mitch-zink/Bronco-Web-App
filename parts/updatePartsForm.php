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
      
      <div class="form-style-6">
      
        <h1>Modify Part: <?php echo $part['itemname']; ?></h1>
            <form action="updateParts.php" method="post">
            <input type="text" name="itemname" value="<?php echo $part['itemname']; ?>" />
            <input type="text" name="itemdesc" value="<?php echo $part['itemdesc']; ?>" />
            <select id="partfamily" name="partfamily">
               <option value="body" <?php echo ($part['partfamily'] == 'body' ? 'selected' : '') ?>>Body</option>
               <option value="brakes" <?php echo ($part['partfamily'] == 'brakes' ? 'selected' : '') ?>>Brakes</option>
               <option value="coolingsystem" <?php echo ($part['partfamily'] == 'coolingsystem' ? 'selected' : '') ?>>Cooling System</option>
               <option value="drivetrain" <?php echo ($part['partfamily'] == 'drivetrain' ? 'selected' : '') ?>>Drive Train</option>
               <option value="electrical" <?php echo ($part['partfamily'] == 'electrical' ? 'selected' : '') ?>>Electrical</option>
               <option value="engine" <?php echo ($part['partfamily'] == 'engine' ? 'selected' : '') ?>>Engine</option>
               <option value="exhaust" <?php echo ($part['partfamily'] == 'exhaust' ? 'selected' : '') ?>>Exhaust</option>
               <option value="interior" <?php echo ($part['partfamily'] == 'interior' ? 'selected' : '') ?>>Interior</option>
               <option value="suspension" <?php echo ($part['partfamily'] == 'suspension' ? 'selected' : '') ?>>Suspension</option>      
            </select>
            <input type="text" name="quantity" value="<?php echo $part['quantity']; ?>" />
            <input type="text" name="comments" value="<?php echo $part['comments']; ?>" />
            <input type="hidden" name="partid" value="<?php echo $partid; ?>">
            <input type="submit" value="Submit Changes" />
         </form>
         
      </div>

      
   </body>
</html>