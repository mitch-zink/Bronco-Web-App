<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Select parts 
$sql = "SELECT * FROM files";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$files = $stmt->fetchAll();
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
  <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
  <li><a class="active" href="#">Projects</a></li>
</ul>
<ul>
  <li><a href="openproject.php">Open a Project</a></li>
  <li><a href="createnewproject.php">Create a New Project</a></li>
  <li><a href="WorkCompleted.php">Work Completed</a></li>
  <li><a class="active" href="#">Files</a></li>
</ul>

<div class="form-style-6">
          <h1>View Files</h1>
            <table>
		        <tr align="center">
                <th>File Name</th>
                <th>File Type</th>
                </tr>
		
                <?php foreach($files as $file) {?> 
                    <tr>
                    <td><?php echo $file['filename']; ?></td>
                    <td><?php echo $file['filetype']; ?></td>	
                    <td><form action="viewfile.php" method="post">
                    <input type="hidden" name="fileid" value="<?php echo $file['fileid']; ?>">
                    <input type="submit" name="select" value="View File">
                    </form></td>
                    </tr>
                <?php }  ?>
            </table>
	      </div>

</body>
</html>