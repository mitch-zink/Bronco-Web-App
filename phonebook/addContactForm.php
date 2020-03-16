<!DOCTYPE html>
<html>
    <head>
    <?php
include("../navbar.php")
?>
        <link rel="stylesheet" type="text/css" href="../css.css">
    </head>
    <body>

        <div class="form-style-6">
            <h1>Enter New Contact Information</h1>
            <form action="addContact.php" method="post">
                    <input type="text" name="fname" placeholder="First Name" pattern="[a-zA-Z ]{2,}" title="Only letters allowed" required/>
                    <input type="text" name="lname" placeholder="Last Name" pattern="[a-zA-Z- ']{2,}" title="Only letters allowed" />
                    <input type="text" name="biz" placeholder="Business Name" pattern="[a-zA-Z0-9- ']{2,}" title="Only letters & numbers allowed" />
                    <input type="text" name="addr1" placeholder="Street Address" pattern="[a-zA-Z0-9- ']{2,}" title="Only letters & numbers allowed" />
                    <input type="text" name="addr2" placeholder="Apartment or other building number" pattern="[a-zA-Z0-9- ']{2,}" title="Only letters & numbers allowed"  />
                    <input type="text" name="city" placeholder="City" pattern="[a-zA-Z- ']{2,}" title="Only letters allowed"/>
                    <input type="text" name="state" placeholder="State" pattern="[A-Z]{2}" title="Enter 2 Upper Case Char for State Abrev" />
                    <input type="text" name="zip" placeholder="Zip" pattern="[0-9]{5}" title="Enter 5 Integers"/>
                    <input type="text" name="email" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Not a proper email address" />
                    <input type="text" name="phone" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Enter with dashes"/>
                    <input type="submit" value="Add Contact" />
                </form>
              
      </div>
      <script src="js/scripts.js"></script>
   </body>
</html>