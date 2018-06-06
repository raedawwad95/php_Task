   <?php
   session_start();
	$errors = array();
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "users";
	$conect = mysqli_connect($server,$user,$pass,$db);
	//signUp
	if(isset($_POST['signUp'])){
		$username =mysqli_real_escape_string($conect,$_POST['username']);
		$email = mysqli_real_escape_string($conect,$_POST['email']);
		$password = mysqli_real_escape_string($conect,$_POST['password']);
		if(empty($username)){
			array_push($errors, "UserName is required");
		}
		if(empty($email)){
			array_push($errors, "Email is required");
		}
		if(empty($password)){
			array_push($errors, "Password is required");
		}
		   // first check the database to make sure 
  		  // a user does not already exist with the same username and/or email
		  $user_check_query = "SELECT * FROM userinfo WHERE username='$username' OR email='$email' LIMIT 1";
		  $result = mysqli_query($conect, $user_check_query);
		  $user = mysqli_fetch_assoc($result);
		  
		  if ($user) { // if user exists
		    if ($user['username'] === $username) {
		      array_push($errors, "Username already exists");
		    }

		    if ($user['email'] === $email) {
		      array_push($errors, "email already exists");
		    }
		  }

		if(count($errors)==0){
			$password = md5($password);
			$spl = "INSERT INTO userinfo (username,email,password) VALUES ('$username','$email','$password')";
			mysqli_query($conect,$spl);
			header("location: login.php");
		}

	}

	//login
	if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conect, $_POST['username']);
  $password = mysqli_real_escape_string($conect, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM userinfo WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conect, $query);

  	if (mysqli_num_rows($results)) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>