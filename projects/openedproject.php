<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Selects data from DB
$sql = "SELECT projectID, projectname FROM projects";

//Prepares the select statement
$stmt = $pdo->prepare($sql);

//Executes the statement
$stmt->execute();

//Retrieves the rows with fetchall
$projectsfromDB = $stmt->fetchAll();

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
   <li><a class="active" href="#">Open a Project</a></li>
   <li><a href="createnewproject.php">Create a New Project</a></li>
   <li><a href="WorkCompleted.php">Work Completed</a></li>
   <li><a href="files.php">Files</a></li>
</ul>

<div class="form-style-6">
         <h1>Open Project</h1>
         <select>
    <?php foreach($projectsfromDB as $project): ?>
        <option value="<?= $project['projectID']; ?>"><?= $project['projectname']; ?></option>
    <?php endforeach; ?>
</select>
            <input type="submit" value="Submit" />
         </form>
      </div>
      <script src="js/scripts.js"></script>


      <div class="form-style-6">
         <h1>Project Name Goes Here and appears only after being selected</h1>
         <form>
            <input type="text" name="projectid" placeholder="projectid" />
            <input type="text" name="projectname" placeholder="projectname" />
            <input type="text" name="Make" placeholder="Make" />
            <input type="text" name="Model" placeholder="Model" />
            <input type="text" name="trim_pkg" placeholder="trim_pkg" />
            <input type="text" name="projectdesc" placeholder="projectdesc" />
            <input type="date" name="purchdate" placeholder="purchdate" />
            <input type="text" name="purchprice" placeholder="purchprice" />
            <input type="text" name="sellprice" placeholder="sellprice" />
            <input type="date" name="selldate" placeholder="selldate" />
            <input type="text" name="projectcomments" placeholder="projectcomments" />
            <input type="submit" value="Submit" />
         </form>
      </div>

</body>

</html>



