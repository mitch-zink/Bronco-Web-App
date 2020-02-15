<?php
   // Gets the connection to the DB
   require_once ('dbconnect.php');
   
   // If variables are not null executes the code within the curly braces
   if (isset($_POST['username']) and isset($_POST['password'])){
   	
   	// Assigning POST values to variables.
   	$username = $_POST['username'];
   	$password = $_POST['password'];
   	
   	// Check for the records from the table
   	$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'"; 
   	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   	$count = mysqli_num_rows($result);
     
     // If successful takes you to homepage.php, if unsuccessful to login.php
   	if ($count == 1){
     header('Location: homepage.php');
   	}else{
   		header('Location: login.php');
   	}
   	}
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css.css">
   </head>
   <body>
   <?php
include("navbar.php")
?>
      <!-- Form -->
      <div class="form-style-6">
         <body id="body_bg">
            <form id="login-form" method="post" action="login.php">
               <p>
                  <input type="text" name="username"placeholder="username" id="username">
               </p>
               <p>
                  <input type="text" type="password" name="password" placeholder="password" id="password">
               </p>
               <input type="submit" value="Submit">
            </form>
      </div>
   </body>
</html>