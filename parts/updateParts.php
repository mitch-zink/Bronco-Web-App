<?php
require("../dbconnect.php");
//fetch inputs
$partid = filter_input(INPUT_POST, "partid");
$itemname = filter_input(INPUT_POST, "itemname");
$itemdesc = filter_input(INPUT_POST, "itemdesc");
$partfamily = filter_input(INPUT_POST, "partfamily");
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
$comments = filter_input(INPUT_POST, "comments");

/*//validate
if (partid === null || $itemname === null || $itemdesc === null || $partfamily === null ||
    $quantity === null) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //update vendor 
	$sql = 'UPDATE parts
				SET itemname =:itemname, itemdesc =:itemdesc, partfamily =:partfamily, quantity =:quantity, 
                comments =:comments where partid =:partid';
      
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':itemname', $itemname);
        $stmt->bindValue(':itemdesc', $itemdesc);
        $stmt->bindValue(':partfamily', $partfamily);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':comments', $comments);
        $stmt->bindValue(':partid', $partid);
      
        $stmt->execute();
        $stmt->closeCursor();
//}
    include('parts.php');
?>