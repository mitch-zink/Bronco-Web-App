<?php
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');
//fetch inputs
$itname = filter_input(INPUT_POST, "itname");
$itdesc = filter_input(INPUT_POST, "itdesc");
$fam = filter_input(INPUT_POST, "fam");
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
$comments = filter_input(INPUT_POST, "comments");

/*//validate
if ($itname === null || $itname === false || 
		$itdesc === null || $itdesc === false || 
		$quantity === null || $quantity === false) { 
        
        $error = "Invalid data. Check all fields and try again.";
    echo $error;
}

else { */
   
    //Insert parts 
	$sql = 'INSERT INTO parts
				(itemname, itemdesc, partfamily, quantity, comments)
			  VALUES
				(:itname, :itdesc, :fam, :quantity, :comments)';
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':itname', $itname);
      $stmt->bindValue(':itdesc', $itdesc);
      $stmt->bindValue(':fam', $fam);
      $stmt->bindValue(':quantity', $quantity);
      $stmt->bindValue(':comments', $comments);
      
      $stmt->execute();
      $stmt->closeCursor();
    
    // Go to index.php
	// echo "Part Added!";
    include('parts.php');

//} 

?>