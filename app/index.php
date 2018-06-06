<?php include ('server.php');
    //if user not login 
    if (empty($_SESSION['username'])) {
        header("location: login.php");
    }
?>
<?php 
$connect = mysqli_connect("localhost","root","","users");
if(isset($_POST['insart'])){
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO images(name) VALUES ('$file')";
    if(mysqli_query($connect,$query)){
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
<div class="header">
    <div style="margin-left: 80%; margin-bottom: 10px"><p><a href="login.php?logout='1'" style="color: white"><h3>Logout</h3></a></p></div>
	<h3>Insert Image</h3>
</div>
	<div class="content">
     <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <h3>
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);

                     ?>
                </h3>
            </div>  
        <?php endif ?> 
        <?php if (isset($_SESSION['username'])): ?>
            <h2 align="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>  
          <?php endif ?>
        <?php include('uploadImage.php') ?> 
    </div>
</div>
<br /><br />

</body>
</html>
    
<script>
    $(document).ready(function(){
        $('#insart').click(function(){
            var image_name = $("#image").val();
            if(image_name ==""){
                alert("Please Select Image");
                return false;
            }else{
                var image = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(image,['gif','png','jpg','jpeg'])==-1){
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        })
    })
</script>