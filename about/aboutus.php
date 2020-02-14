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
  <li><a class="active" href="#">About Us</a></li>
  <li><a href="../users/login.php">Login</a></li>
  <li><a href="../parts/parts.php">Parts</a></li>
  <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
  <li><a href="../projects/projects.php">Projects</a></li>
</ul>
<ul>
  <li><a class="active" href="#">About Us</a></li>
  <li><a href="purpose.php">Purpose</a></li>
  <li><a href="faq.php">FAQ</a></li>
</ul>

<?php 
echo "<h3>About Us</h3>";
echo "<hr>";
echo ("<h3><pre>My passion for the Early Ford Bronco began as a teenager, when my hunting buddies picked me up in one and we set out on our deer hunting adventure. 
Since that moment on, I started saving my pennies and searching for a Bronco to call my own. I found a 1972 rusty steed in a farmer’s field with a 
small tree growing up through the engine block and turned it into this dream machine (pictured below) built for off road and street cruising!</pre>");
echo "<img src=1972_Bronco.jpg width=300 height=200>";
echo ("<pre>After enjoying my trusty steed for a few decades, I sold it and bought a 1974 Bronco in rough shape (pictured below). 
Time to start tracking how much this newest project is costing me.</pre></h3>");
echo "<img src=1974_Bronco.jpg width=300 height=200>";
?>
</body>
</html>
