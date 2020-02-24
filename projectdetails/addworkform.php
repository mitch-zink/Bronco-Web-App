<?php
  $projid = filter_input(INPUT_POST, 'projid', FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="../css.css">
  </head>
  <body>
   <?php include("../navbar.php"); ?>
    <h1>Add Completed Work</h1>
    <div class="form-style-6">
      <h1>Enter Work Information</h1>
        <form action="addwork.php" method="post">
          <input type="text" name="workname" placeholder="Work Name"/>
          <input type="text" name="workdate" placeholder="Date mm/dd/yyyy">
          <textarea type="text" name="workdesc" placeholder="Work Description"></textarea>
          <textarea type="text" name="workcomments" placeholder="Comments"></textarea>
          <input type="hidden" name="projid" value="<?php echo $projid; ?>">
          <input type="submit" value="Add Work" />
        </form>                             
      </div>
   </body>
</html>