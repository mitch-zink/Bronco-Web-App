<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');
//fetch inputs
$partid = filter_input(INPUT_POST, "partid");
$itemname = filter_input(INPUT_POST, "itemname");
$itemdesc = filter_input(INPUT_POST, "itemdesc");
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
$comments = filter_input(INPUT_POST, "comments");

//validate goes here

   
    //update vendor 
	$sql = 'UPDATE parts
				SET itemname =:itemname, itemdesc =:itemdesc, quantity =:quantity, 
                comments =:comments where partid =:partid';
      
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':itemname', $itemname);
        $stmt->bindValue(':itemdesc', $itemdesc);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':comments', $comments);
        $stmt->bindValue(':partid', $partid);
      
        $stmt->execute();
        $stmt->closeCursor();
    
    // Go to index.php
	// echo "Part Added!";
    include('parts.php');
?>