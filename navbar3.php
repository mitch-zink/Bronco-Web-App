<!DOCTYPE html>
<html lang="en">
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

.navbar a ul {
  float: left;
  list-style-type: none;
  font-size: 16px;
  background-color: grey;
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
  padding: 14px 25px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover .dropdown:hover .dropbtn {
  background-color: gray;
}

.dropdown-content li a {
  float: none;
  color: black;
  padding: 1px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a:hover {
  background-color: #grey;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
<ul>
  <div class="dropdown">
    <li><a>
      <button class="dropbtn">Bronco
        <i class="fa fa-caret-down"></i>
        </button></a>
        <div href="#" class="dropdown-content">
        <ul>
      <li><a href="..\home\homepage.php">Home</a></li>
      <li><a href="..\about\aboutus.php">Our Story</a></li>
      <li><a href="..\about\purpose.php">Our Purpose</a></li>
      <li><a href="..\about\faq.php">FAQ</a></li>
      </ul>
      </div>
      </div>
      </li>

  <div class="dropdown">
  <li><a>
    <button class="dropbtn">Access
      <i class="fa fa-caret-down"></i>
    </button></a>
    <div href="#" class="dropdown-content">
      <ul>
      <li><a href="..\start\createua.php">Create User Account</a></li>
      <li><a href="..\start\login.php">Log In</a></li>
      <li><a href="..\start\logout.php">Log Out</a></li>
      </ul>
    </div>
  </div> 
  </li>
  <div class="dropdown">
  <li><a>
    <button class="dropbtn">Phonebook
      <i class="fa fa-caret-down"></i>
    </button></a>
    <div href="#" class="dropdown-content">
      <ul>
      <li><a href="..\phonebook\phonebook.php">View Phonebook</a></li>
      <li><a href="..\phonebook\addContactForm.php">Add a Contact</a></li>
      </ul>
    </div>
  </div>
  </li>
  <div class="dropdown">
  <li><a>
    <button class="dropbtn">Parts
      <i class="fa fa-caret-down"></i>
    </button></a>
    <div href="#" class="dropdown-content">
      <ul>
      <li><a href="..\parts\parts.php">View Parts Inventory</a></li>
      <li><a href="..\parts\addPartsForm.php">Add a Part</a></li>
      </ul>
    </div>
  </div> 
  </li>
  <div class="dropdown">
  <li><a>
    <button class="dropbtn">Project Management
      <i class="fa fa-caret-down"></i>
    </button></a>
    <div href="#" class="dropdown-content">
      <ul>
      <li><a href="..\projectdetails\projectdetails.php">Manage Projects</a></li>
      <li><a href="..\project\createnewproject.php">Create a new project</a></li>
      <li><a href="..\projectdetails\files.php">View Project Files</a></li>
      </ul>
    </div>
  </div> 
  </li>
</ul>

</div>

</body>
</html>
