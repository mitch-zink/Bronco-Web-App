<?php
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
// Query for DDL
$query = $db->query("select * from projects order by projectname asc");
//

// Checks for a null value
if (!isset($cat_id_1)) {
    $cat_id_1 = filter_input(INPUT_POST, 'cat_id_1', FILTER_VALIDATE_INT);
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
         <form action="#" name="DDL" method="post">
            <select name="cat_id_1">
               <option value='0'></option>
               <option value='1' onClick="location.href='../projectdetails/updateproject.php'">Update Project Details</option>
                <option value='2' onClick="location.href='../projectdetails/WorkCompleted.php'">Work Completed</option>
               

            </select>
            
         </form>
         </form>
      </div>
      
<link rel="stylesheet" type="text/css" href="../css.css">


      <script src="js/scripts.js"></script>
   </body>
</html>