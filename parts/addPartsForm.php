<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css.css">
    </head>
    <body>
    <ul>
      <li style="float:left"><a href="#">Bronco</a>
      <li><a href="../home/home.php">Home</a></li>
      <li><a href="..home/homepage.php">Admin Home Page</a></li>
      <li><a href="../about/aboutus.php">About Us</a></li>
      <li><a href="../users/login.php">Login</a></li>
      <li><a class="active" href="#">Parts</a></li>
      <li><a href="../phonebook/phonebook.php">Phonebook</a></li>
      <li><a href="../projects/projects.php">Projects</a></li>
    </ul>
    <ul>
      <li><a href="parts.php">View Parts</a></li>
      <li><a class="active" href="addPartsForm.php">Add Parts</a></li>
    </ul>
        <h1>Add a New Part</h1>
        <div class="form-style-6">
            <h1>Enter Parts Information</h1>
                <form action="addParts.php" method="post"><!--Submit takes user to add transaction form-->
                    <input type="text" name="itname" placeholder="Part Name"/>
                    <textarea type="text" name="itdesc" placeholder="Part Description"></textarea>
                    <input type="text" name="quantity" placeholder="Quantity On Hand" />
                    <textarea type="text" name="comment" placeholder="Comments"></textarea>
                    <input type="submit" value="Add Part" />
                </form>
                              
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>