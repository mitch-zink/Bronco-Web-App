<?php
   // Connect to bronco DB
   $link = mysqli_connect("localhost", "root", "", "bronco");
    
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   // If value is assigned, executes the code within the curly braces
   if (isset($_POST['projectid']) ){
   
   // Escape user inputs for security
   $projectid = mysqli_real_escape_string($link, $_REQUEST['projectid']);
   $projectname = mysqli_real_escape_string($link, $_REQUEST['projectname']);
   $Make = mysqli_real_escape_string($link, $_REQUEST['Make']);
   $model = mysqli_real_escape_string($link, $_REQUEST['model']);
   $trim_pkg = mysqli_real_escape_string($link, $_REQUEST['trim_pkg']);
   $projectdesc = mysqli_real_escape_string($link, $_REQUEST['projectdesc']);
   $purchdate = mysqli_real_escape_string($link, $_REQUEST['purchdate']);
   $purchprice = mysqli_real_escape_string($link, $_REQUEST['purchprice']);
   $sellprice = mysqli_real_escape_string($link, $_REQUEST['sellprice']);
   $selldate = mysqli_real_escape_string($link, $_REQUEST['selldate']);
   $projectcomments = mysqli_real_escape_string($link, $_REQUEST['projectcomments']);
    
   // Attempt insert query execution
   $sql = "INSERT INTO projects (projectid,projectname,Make,model,trim_pkg,projectdesc,purchdate,purchprice,sellprice,selldate,projectcomments) VALUES ('$projectid', '$projectname', '$Make', '$model', '$trim_pkg', '$projectdesc', '$purchdate', '$purchprice', '$sellprice', '$selldate', '$projectcomments')";
   if(mysqli_query($link, $sql)){
       echo "Records added successfully.";
   } else{
       echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
   }
   }
   // Close connection
   mysqli_close($link);
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
      <div class="form-style-6">
         <h1>Create New Project</h1>
         <form action="createnewproject.php" method="post">
            <input type="text" name="projectid" placeholder="projectid" />
            <input type="text" name="projectname" placeholder="projectname" />
            <input type="text" name="Make" placeholder="Make" />
            <input type="text" name="model" placeholder="model" />
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
      <script src="js/scripts.js"></script>
   </body>
</html>