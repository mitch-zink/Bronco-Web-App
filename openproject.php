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

?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css.css">
   </head>
   <body>
   <?php
include("navbar.php")
?>
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
            <input type="text" readonly name="projectid" placeholder="projectid" value="Project ID: <?php
    echo $project["projectid"];
?>" />
            <input type="text" readonly  name="projectname" placeholder="projectname" value="Project Name: <?php
    echo $project["projectname"];
?>" />
            <input type="text"  readonly name="Make" placeholder="Make" value="Make: <?php
    echo $project["make"];
?>" />
            <input type="text"  readonly name="Model" placeholder="Model" value="Model: <?php
    echo $project["model"];
?>" />
            <input type="text"  readonly name="trim_pkg" placeholder="trim_pkg" value="Trim Package: <?php
    echo $project["trim_pkg"];
?>" />
            <input type="text"  readonly name="projectdesc" placeholder="projectdesc" value="Project Description: <?php
    echo $project["projectdesc"];
?>" />
            <input type="text"  readonly name="purchdate" placeholder="purchdate" value="Purchase Date: <?php
    echo $project["purchdate"];
?>" />
            <input type="text" readonly  name="purchprice" placeholder="purchprice" value="Purchase Price: <?php
    echo $project["purchprice"];
?>" />
            <input type="text"  readonly name="sellprice" placeholder="sellprice" value="Sell Price: <?php
    echo $project["sellprice"];
?>" />
            <input type="text"  readonly name="selldate" placeholder="selldate" value="Sell Date: <?php
    echo $project["selldate"];
?>" />
            <input type="text"  readonly name="projectcomments" placeholder="projectcomments" value="Project Comments: <?php
    echo $project["projectcomments"];
?>" />
            <?php
endforeach;
?>
         </form>
      </div>
   </body>
</html>