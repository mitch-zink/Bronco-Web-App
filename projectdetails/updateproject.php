<?php
// Code for DDL , populating the form with data from the DB
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
//

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


// Code for update statement 
// Get data from form

if(!isset($projectid)) {
   $projectid = filter_input(INPUT_POST, "projectid", FILTER_VALIDATE_INT);
}

$projectid = $_POST['projectid'];
$projectname = $_POST['projectname'];
$make = $_POST['make'];
$model = $_POST['model'];
$trim_pkg = $_POST['trim_pkg'];
$projectdesc = $_POST['projectdesc'];
$purchdate = $_POST['purchdate'];
$purchprice = $_POST['purchprice'];
$sellprice = $_POST['sellprice'];
$selldate = $_POST['selldate'];
$projectcomments = $_POST['projectcomments'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bronco";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE projects
        SET projectname = :projectname,
            make = :make,
            model = :model,
            trim_pkg = :trimpkg,
            projectdesc = :projectdesc,
            purchdate = :purchdate,
            purchprice = :purchprice,
            selldate = :selldate,
            sellprice = :sellprice,
            projectcomments = :projectcomments
        WHERE projectid = :cat_id_1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  //header('Location: openproject.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
// ------------------------------
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="../css.css">
   </head>
   <body>
   <?php
include("../navbar.php")
?>
      <!-- DDL -->
      <div class="form-style-6">
         <h1>Select a project to continue</h1>
         <form action="#" name="DDL" method="get">
            <select name="cat_id_1">
               <option></option>
               <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['projectid'] . '">' . $row['projectname'] . '</option>';
} ?>
            </select>
            <input type="submit" name="action" value="Submit">
         </form>
         </form>
      </div>
      <script src="js/scripts.js"></script>
      <div class="form-style-6">
         <?php foreach ($projects as $project): ?>
         <h1><?php echo $project["projectname"]; ?></h1>
         <?php endforeach; ?>
         <form action="updateproject.php" method="post">
            <?php foreach ($projects as $project): ?>
            <label for="projectid">Project ID</label>
            <input type="text"  input="readonly" name="projectid" placeholder="projectid" value="<?php echo $project["projectid"];?>" />
           
            <label for="projectid">Project Name</label>
            <input type="text"   name="projectname" placeholder="projectname" value="<?php echo $project["projectname"];?>" />
            
            <label for="projectid">Make</label>
            <input type="text"   name="make" placeholder="make" value="<?php echo $project["make"];?>" />
            
            <label for="projectid">Model</label>
            <input type="text"   name="model" placeholder="model" value="<?php echo $project["model"];?>" />
            
            <label for="projectid">Trim Package</label>
            <input type="text"   name="trim_pkg" placeholder="trim_pkg" value="<?php echo $project["trim_pkg"];?>" />
            
            <label for="projectid">Project Description</label>
            <input type="text"   name="projectdesc" placeholder="projectdesc" value="<?php echo $project["projectdesc"];?>" />
           
            <label for="projectid">Purchase Date</label>
            <input type="text"   name="purchdate" placeholder="purchdate" value="<?php echo $project["purchdate"];?>" />
          
            <label for="projectid">Purchase Price</label>
            <input type="text"   name="purchprice" placeholder="purchprice" value="<?php echo $project["purchprice"];?>" />
            
            <label for="projectid">Sell Price</label>
            <input type="text"   name="sellprice" placeholder="sellprice" value="<?php echo $project["sellprice"];?>" />
          
            <label for="projectid">Sell Date</label>
           <input type="text"   name="selldate" placeholder="selldate" value="<?php echo $project["selldate"];?>" />
            
           <label for="projectid">Project Comments</label>
            <input type="text"   name="projectcomments" placeholder="projectcomments" value="<?php echo $project["projectcomments"];?>" />
            <input type="submit" name="action" value="Submit">

            <?php endforeach;?>

         </form>
      </div>
   </body>
</html>