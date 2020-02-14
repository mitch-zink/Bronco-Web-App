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
  <li><a class="active" href="aboutus.php">About Us</a></li>
  <li><a href="../users/login.php">Login</a></li>
  <li><a href="../parts/parts.php">Parts</a></li>
  <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
  <li><a href="../projects/projects.php">Projects</a></li>
</ul>
<ul>
  <li><a href="aboutus.php">About Us</a></li>
  <li><a href="purpose.php">Purpose</a></li>
  <li><a class="active" href="faq.php">FAQ</a></li>
</ul>

<?php 
echo "<h3>FAQ</h3>";
echo "<hr>";
echo "<h3><pre>1) Can I create more than one project?
Answer: Yes, you can create as many projects as you can manage.
2) Can I delete a project after I‘ve sold it?
Answer: Yes, you can delete a project at any time you no longer need it.
3) Can I use this tool to tracker other makes, models and years of project cars?
Answer: Yes, other data is populated in the tables for this purpose.
</h3></pre>";
?>

</body>
</html>