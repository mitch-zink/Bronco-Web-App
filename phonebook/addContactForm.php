<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css.css">
    </head>
    <body>
    <ul>
      <li style="float:left"><a href="#">Bronco</a>
      <li><a href="../home/home.php">Home</a></li>
      <li><a href="../home/homepage.php">Admin Home Page</a></li>
      <li><a href="../about/aboutus.php">About Us</a></li>
      <li><a href="../users/login.php">Login</a></li>
      <li><a href="../parts/parts.php">Parts</a></li>
      <li><a class="active" href="#">Phonebook</a></li>
      <li><a href="../projects/projects.php">Projects</a></li>
    </ul>
    <ul>
      <li><a href="phonebook.php">View Contacts</a></li>
      <li><a class="active" href="#">Add Contact</a></li>
    </ul>

        <h1>Add a New Contact</h1>
        <div class="form-style-6">
            <h1>Enter Contact Information</h1>
                <form action="addTransaction.php" method="post">
                    <input type="text" name="fname" placeholder="First Name"/>
                    <input type="text" name="lname" placeholder="Last Name" />
                    <input type="text" name="biz" placeholder="Business Name" />
                    <input type="text" name="addr1" placeholder="Street Address" />
                    <input type="text" name="addr2" placeholder="Apartment or other building number" />
                    <input type="text" name="city" placeholder="City" />
                    <input type="text" name="state" placeholder="State" />
                    <input type="text" name="zip" placeholder="Zip" />
                    <input type="text" name="email" placeholder="Email Address" />
                    <input type="text" name="phone" placeholder="Phone Number" />
                    <textarea type="text" name="comment" placeholder="Comments"></textarea>
                    <input type="submit" value="Add Contact" />
                </form>
              
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>