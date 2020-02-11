<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        <ul>
         <li style="float:left"><a href="#">Bronco</a>
         <li><a href="home.php">Home</a></li>
         <li><a href="homepage.php">Admin Home Page</a></li>
         <li><a href="aboutus.php">About Us</a></li>
         <li><a href="purpose.php">Purpose</a></li>
         <li><a href="faq.php">FAQ</a></li>
         <li><a href="createUA.php">Create User Account</a></li>
         <li><a href="login.php">Login</a></li>
         <li><a href="logout.php">Logout</a></li>
         <li><a href="parts.php">Parts</a></li>
         <li><a href="phonebook.php">Phonebook</a></li>
         <li><a href="projects.php">Projects</a></li>
         <li><a href="files.php">Files</a></li>
         <li><a href="WorkCompleted.php">Work Completed</a></li>
      </ul>
        <h1>Add a New Part</h1>
        <div class="form-style-6">
            <h1>Enter Parts Information</h1>
                <form action="addParts.php" method="post">
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