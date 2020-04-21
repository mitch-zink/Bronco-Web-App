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
    <div class="form-style-6">
      <h1>Enter Work Information</h1>
        <form action="addwork.php" method="post">
          <input type="text" name="workname" placeholder="Work Name" placeholder="Work Name" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
          <input type="date" name="workdate" placeholder="Date yyyy/mm/dd">
          <textarea type="text" name="workdesc" placeholder="Work Description" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="20" title="Only 20 letters & numbers allowed" ></textarea>
          <textarea type="text" name="workcomments" placeholder="Comments" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" ></textarea>
          <input type="hidden" name="projid" value="<?php echo $projid; ?>">
          <input type="submit" value="Add Work" />
        </form>                             
      </div>
   </body>
</html>