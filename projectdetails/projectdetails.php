<?php
require_once("../navbar.php");

$action = filter_input(INPUT_POST, 'action');

if($action == "details"){
   header("Location: updateprojectform.php");
   exit;
}else if($action == "projectparts"){
   header("Location: projectParts.php");
   exit;
}else if($action == "workcomplete"){
   header("Location: WorkCompleted.php");
   exit;
}else if($action == "report1"){
   header("Location: reports.php");
   exit;
}else if($action == "report2"){
   header("Location: report2.php");
   exit;
}
?>

<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="../css.css">
   </head>
   <body>
  <!-- DDL -->
  <div class="form-style-6">
         <h1>Project Manager</h1>
         <form action="#" name="DDL" method="post">
            <select name="action">
               <option value="" disabled selected>Please choose from the following</option>
               <option value='projectparts'>Manage Project Parts</option>
               <option value='details'>Update Project Details</option>
               <option value='workcomplete'>Work Completed</option>
               <option value='report1'>Project Report</option>
               <option value='report2'>Part Family Report</option>
            </select>
            <input type="submit" value="Select">
         </form>
      </div>
   </body>
</html>