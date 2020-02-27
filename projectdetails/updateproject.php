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

$action = filter_input(INPUT_POST, 'action');

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



$projectid = filter_input(INPUT_POST, 'projectid');
$projectname =filter_input(INPUT_POST, 'projectname');
$make =filter_input(INPUT_POST, 'make');
$model = filter_input(INPUT_POST, 'model');
$trim_pkg = filter_input(INPUT_POST, 'trim_pkg');
$projectdesc = filter_input(INPUT_POST, 'projectdesc');
$purchdate = filter_input(INPUT_POST, 'purchdate');
$purchprice = filter_input(INPUT_POST, 'purchprice');
$sellprice = filter_input(INPUT_POST, 'sellprice');
$selldate = filter_input(INPUT_POST, 'selldate');
$projectcomments =filter_input(INPUT_POST, 'projectcomments');




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


$stmt = $db->prepare($sql);
$stmt->bindValue(':projectame', $projectname);
$stmt->bindValue(':make', $make);
$stmt->bindValue(':model', $model);
$stmt->bindValue(':trim_pkg', $trim_pkg);
$stmt->bindValue(':projectdesc', $projectdesc);
$stmt->bindValue(':purchdate', $purchdate);
$stmt->bindValue(':purchprice', $purchprice);
$stmt->bindValue(':selldate', $selldate);
$stmt->bindValue(':sellprice', $sellprice);
$stmt->bindValue(':projectcomments', $projectcomments);
$stmt->bindValue(':projectid', $projectid);

//$stmt->execute();
//$stmt->closeCursor();



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  
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