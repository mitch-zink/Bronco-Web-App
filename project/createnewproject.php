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
            <input type="text" name="projectid" placeholder="projectid" readonly/>
            <input type="text" name="projectname" placeholder="Project Name" pattern="[a-zA-Z0-9- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            <input type="text" name="Make" placeholder="Make (example Ford, Chevy, Toyota)" pattern="[a-zA-Z0-9- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            <input type="text" name="model" placeholder="Model (exapmle Bronco, Blazer, Landrover)" pattern="[a-zA-Z0-9- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            <input type="text" name="trim_pkg" placeholder="Trim Package (example Sport, Ranger, Explorer)" pattern="[a-zA-Z0-9- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
            <input type="text" name="projectdesc" placeholder="Project Description" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" />
            <input type="date" name="purchdate" placeholder="Purchase Date" />
            <input type="text" name="purchprice" placeholder="Purchase Price" pattern='^\d+(?:\.\d{0,2})$' title="Only numbers allowed - Include 2 decimal points" />
            <input type="text" name="sellprice" placeholder="Sell Price" pattern='^\d+(?:\.\d{0,2})$' title="Only numbers allowed - Include 2 decimal points" />
            <input type="date" name="selldate" placeholder="Sell Date" />
            <input type="text" name="projectcomments" placeholder="Project Comments" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" />
            <input type="submit" value="Submit" />
         </form>
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>