<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: gray;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">

<div class="dropdown">
    <button class="dropbtn">Bronco 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="..\home\home.php">Home</a>
      <a href="..\about\aboutus.php">About Us</a>
      <a href="..\about\purpose.php">Purpose</a>
      <a href="..\about\faq.php">FAQ</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Start Here 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="..\start\createua.php">Create User Account</a>
      <a href="..\start\login.php">Log-In</a>
      <a href="..\start\logout.php">Log-Out</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Phonebook 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="..\phonebook\phonebook.php">View Phonebook</a>
      <a href="..\phonebook\addContactForm.php">Add to Phonebook</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Parts 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="..\parts\parts.php">View Parts</a>
      <a href="..\parts\addPartsForm.php">Add Parts</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Project Management 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="..\project\createnewproject.php">Create a Project</a>
      <a href="..\projectdetails\projectdetails.php">Manage Project</a>
      <a href="..\projectdetails\files.php">View Project Files</a>
    </div>
  </div> 

</div>

</body>
</html>
