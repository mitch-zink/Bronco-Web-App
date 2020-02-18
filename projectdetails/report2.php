<?php
require('../dbconnect.php');

//$dsn = "SELECT partid, partfamily, FROM parts AND transtype, price, qty FROM transactions INNER JOIN transactions ON parts.partid=transactions.partid";

$dsn = "SELECT partid,
               partfamily,
               transtype,
               price,
               qty
        INNER JOIN parts.partid = transactions.partid";

$result = $db->query($dsn);

if ($result->num_rows > 0) {
    // output data of each row
    $sum = 0;
    while($row = $result->fetch_assoc()) {
        echo "$sum";
        echo "id: " . $row["partid"], "family: " , $row["partfamily"]. "type: " . $row["transtype"]. "price: " , $row["price"], "quantity: " , $row["qty"], "<br>";
        $sum = $sum + "price";
        echo "$sum";
    }
} else {
    echo "0 results";
}
 $db->close();
?>