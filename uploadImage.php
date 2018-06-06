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
	<title>Insart Image</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
	<br /><br />
	<div class="container" style="width: 500px;">
		<h3 align="center">Insart Image</h3>
		<br/>
		<form method="POST" enctype="multipart/form-data">
			<input type="file" name="image" id="image"/>
			<br/>
			<input type="submit" name="insart" id="insart" value="Insart" value="btn">
			<h3 align="center"><a href="retriveImage.php">show All Image</a></h3>
		</form>
		
		</div>
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