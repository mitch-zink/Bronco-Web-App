<?php
// ------------------------------
// Update statement
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bronco";

// Checks for null values
if (!isset($cat_id_1)) {

}

$cat_id_1 = filter_input(INPUT_GET, 'projectid', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'projectname', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'Make', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'Model', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'trim_pkg', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'projectdesc', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'purchdate', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'purchprice', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'sellprice', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'selldate', FILTER_VALIDATE_INT);
$cat_id_1 = filter_input(INPUT_GET, 'projectcomments', FILTER_VALIDATE_INT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE projects SET projectname='testing' WHERE projectid=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

// DB connection
$dsn = 'mysql:host=localhost;dbname=bronco';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password);
    //  echo '<p> You are connected to the database ! </p>';
    
}
catch(PDOException $e) {
    $error_message = $e->getMessage();
    //  echo "<p> Connection error! : $error_message</p>";
    
}
// ------------------------------

// ------------------------------
// Query for DDL
$query = $db->query("select * from projects order by projectname asc");
//

// Checks for a null value
if (!isset($cat_id_1)) {
    $cat_id_1 = filter_input(INPUT_GET, 'cat_id_1', FILTER_VALIDATE_INT);
}

// Runs a query based on the selected projectid from the DDL
$queryprojects = 'SELECT * FROM projects
   							WHERE projectid = :cat_id_1
   							ORDER BY projectid';
$statement2 = $db->prepare($queryprojects);
$statement2->bindValue(':cat_id_1', $cat_id_1);
$statement2->execute();
$projects = $statement2->fetchAll();
$statement2->closeCursor();
// ------------------------------
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css.css">
   </head>
   <body>
      <ul>
         <li style="float:left"><a href="#">Bronco</a>
         <li><a href="home.php">Home</a></li>
         <li><a href="homepage.php">Admin Home Page</a></li>
         <li><a href="aboutus.php">About Us</a></li>
         <li><a href="purpose.php">Purpose</a></li>
         <li><a href="faq.php">FAQ</a></li>
         <li><a href="createUA.php">Create project Account</a></li>
         <li><a href="login.php">Login</a></li>
         <li><a href="logout.php">Logout</a></li>
         <li><a href="parts.php">Parts</a></li>
         <li><a href="phonebook.php">Phonebook</a></li>
         <li><a href="projects.php">Projects</a></li>
         <li><a href="files.php">Files</a></li>
         <li><a href="WorkCompleted.php">Work Completed</a></li>
         <li><a href="createnewproject.php">Create New Project</a></li>
         <li><a href="openproject.php">Open Project</a></li>
      </ul>
      <!-- DDL -->
      <div class="form-style-6">
         <h1>Select a project to continue</h1>
         <form action="#" name="DDL" method="get">
            <select name="cat_id_1">
               <option></option>
               <?php
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['projectid'] . '">' . $row['projectname'] . '</option>';
}
?>
            </select>
            <input type="submit" name="action" value="Submit">
         </form>
         </form>
      </div>
      <script src="js/scripts.js"></script>
      <div class="form-style-6">
         <?php
foreach ($projects as $project):
?>
         <h1><?php
    echo $project["projectname"];
?></h1>
         <?php
endforeach;
?>
         <form>
            <?php
foreach ($projects as $project):
?>
            <input type="text"  name="projectid" placeholder="projectid" value="<?php
    echo $project["projectid"];
?>" />
            <input type="text"   name="projectname" placeholder="projectname" value="<?php
    echo $project["projectname"];
?>" />
            <input type="text"   name="Make" placeholder="Make" value="<?php
    echo $project["make"];
?>" />
            <input type="text"   name="Model" placeholder="Model" value="<?php
    echo $project["model"];
?>" />
            <input type="text"   name="trim_pkg" placeholder="trim_pkg" value="<?php
    echo $project["trim_pkg"];
?>" />
            <input type="text"   name="projectdesc" placeholder="projectdesc" value="<?php
    echo $project["projectdesc"];
?>" />
            <input type="text"   name="purchdate" placeholder="purchdate" value="<?php
    echo $project["purchdate"];
?>" />
            <input type="text"   name="purchprice" placeholder="purchprice" value="<?php
    echo $project["purchprice"];
?>" />
            <input type="text"   name="sellprice" placeholder="sellprice" value="<?php
    echo $project["sellprice"];
?>" />
            <input type="text"   name="selldate" placeholder="selldate" value="<?php
    echo $project["selldate"];
?>" />
            <input type="text"   name="projectcomments" placeholder="projectcomments" value="<?php
    echo $project["projectcomments"];
?>" />
            <?php
endforeach;
?>
         </form>
      </div>
   </body>
</html>