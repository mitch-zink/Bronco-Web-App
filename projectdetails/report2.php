<?php
$connection = mysqli_connect('localhost', 'root', '');

$select_db = mysqli_select_db($connection, 'bronco');


$dsn = 'mysql:host=localhost;dbname=tradewinds';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn,$username,$password);
    echo "connected";
}
catch (PDOException $e) {
    $error_message = $e->getMessage();
}

$dsn = "SELECT partid, partfamily, FROM parts AND transtype, price, qty FROM transactions INNER JOIN transactions ON parts.partid=transactions.partid";
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