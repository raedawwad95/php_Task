<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['delete'])) {
            $ser = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'users';
            $conn = mysqli_connect($ser, $user, $pass,$db);
            
            if(! $conn ) {
               die('Could not connect: ');
            }
				
            $id = $_POST['id'];
            
            $sql = "DELETE FROM images WHERE id = $id" ;
            
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not delete data:');
            }
            
            echo "Deleted data successfully\n";
            
            mysqli_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">Enter the (IDImage) you want to delete</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <button type="submit" id ="delete" name="delete" class="btn btn-danger">Delete</button>
                        </td>
                     </tr>
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <br/>
                           <button type="button" class="btn btn-info" style="margin-bottom: 50px"><a href="index.php">back to page home</a></button>
                        </td>
                     </tr>
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>