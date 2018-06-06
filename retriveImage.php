<?php 
  $connect = mysqli_connect("localhost","root","","users");
 ?> 
<!DOCTYPE html>
<html>
<head>
  <title>Retrive Image</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
   <div class="header">
        <h3 align="center">Image</h3>
   </div>
<div class="content">   
<div align="center">      
    <table class="table table_bordered">
         <?php  
            $query = "SELECT * FROM images ORDER BY id DESC";  
            $result = mysqli_query($connect, $query);  
            while($row = mysqli_fetch_array($result))  
            {  
                  echo '<td align="center">'.$row["id"]."</td>";
                  echo '
                      <tr>   
                           <td align="center">  
                                <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                           </td> 
                      </tr>
                  ';
            }                        
            ?>
            <?php 
    include ('deleteImage.php');
     ?>
    </table>
</div>
</div>
</div>
<br/>
<br/>
</body>
</html>