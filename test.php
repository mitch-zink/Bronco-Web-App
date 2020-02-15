<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bronco";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $projectid = $_POST['projectid'];
            $projectname = $_POST['projectname'];
            
            $sql = "UPDATE employee ". "SET projectname = $projectname ". 
               "WHERE projectid = $projectid" ;
               $sql->execute();
                    
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Employee ID</td>
                        <td><input name = "projectid" type = "text" 
                           id = "projectid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Employee Salary</td>
                        <td><input name = "projectname" type = "text" 
                           id = "projectname"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>