
<!DOCTYPE html>
<html>
<head>
<?php
include("../navbar.php")
?>
<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="dropdown">
  <button class="dropbtn">About Us</button>
  <div class="dropdown-content">
    <a onClick="location.href='../about/purpose.php'">Purpose</a>
    <a onClick="location.href='../about/faq.php'">FAQ</a>
  </div>
</div>
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
echo "";
echo ("<pre></pre>");
?>
<input type="button" onClick="location.href='../home/home.php'" name="submit1" value="Home"; 
</body>
</html>
