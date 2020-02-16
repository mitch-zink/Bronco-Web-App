<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');
//fetch inputs
$itname = filter_input(INPUT_POST, "itname");
$itdesc = filter_input(INPUT_POST, "itdesc");
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
$comment = filter_input(INPUT_POST, "comment");

/*//validate
if ($itname === null || $itname === false || 
		$itdesc === null || $itdesc === false || 
		$quantity === null || $quantity === false) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //Insert vendor 
	$sql = 'INSERT INTO parts
				(itemname, itemdesc, quantity, comments)
			  VALUES
				(:itname, :itdesc, :quantity, :comment)';
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':itname', $itname);
      $stmt->bindValue(':itdesc', $itdesc);
      $stmt->bindValue(':quantity', $quantity);
      $stmt->bindValue(':comment', $comment);
      
      $stmt->execute();
      $stmt->closeCursor();
    
    // Go to index.php
	// echo "Part Added!";
    include('parts.php');

//} 

?>