<?php
require('../dbconnect.php');
include("../navbar.php");

$action = filter_input(INPUT_POST, 'action');
$partfamily = filter_input(INPUT_POST, 'partfamily');

$queryReport = "SELECT itemname,
                       transtype,
                       price,
                       transactions.quantity
                FROM parts, transactions
                WHERE parts.partid = transactions.partid
                AND parts.partfamily = :partfamily";
$result = $db->prepare($queryReport);
$result->bindValue(":partfamily", $partfamily);
$result->execute();
$report = $result->fetchAll();
$result->closeCursor();
  
if($action == "View Family Report"){
  $total = 0;
  foreach($report as $part){
    $total += ($part['price'] * $part['quantity']);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>

<?php if($action != "View Family Report") { ?>
<div class="form-style-6">
  <form method="post">
    <h1>Select Part Family</h1>
    <select id="partfamily" name="partfamily">
      <option value="body">Body</option>
      <option value="brakes">Brakes</option>
      <option value="coolingsystem">Cooling System</option>
      <option value="drivetrain">Drive Train</option>
      <option value="electrical">Electrical</option>
      <option value="engine">Engine</option>
      <option value="exhaust">Exhaust</option>
      <option value="interior">Interior</option>
      <option value="suspension">Suspension</option>      
    </select>
    <input type="submit" name="action" value="View Family Report">
  </form>
</div>

<?php }else{ ?>
<div class="form-style-6">
<h1><?php echo ucfirst($partfamily) ?></h1>
  <table align="center">
    <tr>
      <th>Part Name</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
  <?php foreach($report as $part) {?>
    <tr>
      <td><?php echo ucwords($part['itemname']); ?></td>
      <td><?php echo '$'.$part['price']; ?></td>
      <td><?php echo $part['quantity']; ?></td>
    </tr>
  <?php } ?>
    <tr></tr>
    <tr></tr>
    <tr>
      <th>Total Spent on Part Family:</th>
      <td><?php echo '$'.$total; ?></td>
    </tr>
  </table>
<form action="report2.php" align="center">
  <input type="submit" value="Back">
</form>
</div>
<?php } ?>
</body>
</html>