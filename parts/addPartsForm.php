<!DOCTYPE html>
<html>
    <head>
 
        <link rel="stylesheet" type="text/css" href="../css.css">
    </head>
    <body>
   <?php
include("../navbar.php")
?>
        <h1>Add a New Part</h1>
        <div class="form-style-6">
            <h1>Enter Parts Information</h1>
                <form action="addParts.php" method="post">
                    <input type="text" name="itname" placeholder="Part Name"/>
                    <textarea type="text" name="itdesc" placeholder="Part Description"></textarea>
                    <select id="partfamily" name="partfamily">
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
                    <input type="text" name="quantity" placeholder="Quantity On Hand" />
                    <textarea type="text" name="comment" placeholder="Comments"></textarea>
                    <input type="submit" value="Add Part" />
                </form>
                              
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>