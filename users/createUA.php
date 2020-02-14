<?php
// Connect to bronco DB
$link = mysqli_connect("localhost", "root", "", "bronco");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// If value is assigned, executes the code within the curly braces
if (isset($_POST['userid']) and isset($_POST['username']) and isset($_POST['password']) ){

// Escape user inputs for security
$userid = mysqli_real_escape_string($link, $_REQUEST['userid']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// Attempt insert query execution
$sql = "INSERT INTO users (userid, username, password) VALUES ('$userid', '$username', '$password')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>

<ul>
  <li style="float:left"><a href="#">Bronco</a>
  <li><a href="../home/home.php">Home</a></li>
  <li><a href="../home/homepage.php">Admin Home Page</a></li>
  <li><a href="../about/aboutus.php">About Us</a></li>
  <li><a class="active" href="login.php">Login</a></li>
  <li><a href="../parts/parts.php">Parts</a></li>
  <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
  <li><a href="../projects/projects.php">Projects</a></li>
</ul>
<ul>
  <li><a href="login.php">Login</a></li>
  <li><a class="active" href="#">Create New User Account</a></li>
</ul>

<div class="form-style-6">
<form action="createua.php" method="post">
    <p>
        <input type="text" name="userid"placeholder="userid" id="userid">
    </p>
    <p>
        <input type="text"placeholder="username" name="username" id="username">
    </p>
    <p>
        <input type="text" name="password" placeholder="password"id="password">
    </p>
    <input type="submit" value="Submit">
</form>
</div>
</body>
</html>