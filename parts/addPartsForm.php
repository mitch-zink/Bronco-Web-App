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
            <h1>Enter Parts Information</h1>
                <form action="addParts.php" method="post">
                    <input type="text" name="itname" placeholder="Part Name" pattern="[a-zA-Z0-9- ']{2,}" maxlength="15" title="Only 15 letters & numbers allowed" />
                    <textarea type="text" name="itdesc" placeholder="Part Description" pattern="[a-zA-Z0-9,.- ']{2,}" maxlength="1000" title="Only letters & numbers allowed" ></textarea>
                    <select id="partfamily" name="fam">
                        <option value="body">Body</option>
                        <option value="brakes">Brakes</option>
                        <option value="coolingsystem">Cooling System</option>
                        <option value="drivetrain">Drive Train</option>
                        <option value="electrical">Electrical</option>
                        <option value="engine">Engine</option>
                        <option value="exhaust">Exhaust</option>
                        <option value="interior">Interior</option>
                        <option value="suspension">Suspension</option>      
                    </select>
                    <input type="text" name="quantity" placeholder="Quantity On Hand" pattern="[0-9]{1,}" maxlength="4" title="Max 4 numbers allowed"  />
                    <textarea type="text" name="comments" placeholder="Comments" pattern="[a-zA-Z0-9.,- ']{2,}" maxlength="1000" title="Only letters & numbers allowed"  ></textarea>
                    <input type="submit" value="Add Parts" />
                </form>
                              
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>