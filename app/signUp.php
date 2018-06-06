<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="sing-log-wrap">
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-area">
            <div class="form-sing">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="login.php" aria-controls="Log In" role="tab" data-toggle="tab">Sign In</a></li>
                    <li role="presentation"><a href="signUp.php" aria-controls="profile" role="tab" data-toggle="tab">Sign Up</a></li>
                </ul>


                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <form method="POST" action="signUp.php">
                        	<?php 
				    		include ('error.php')
				    		?>
                            <div class="form-bor">
                                <div class="form-input-group">
                                    <label for="">Username</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="username" placeholder="User Name" value="<?php echo !empty($_POST['username']) ? $_POST['username'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-input-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" placeholder="Email" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : ''; ?>">
                                </div>

                                <div class="form-input-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-input-group">
                                    <button type="submit" class="btn"  name="signUp">Sing Up</button>
                                </div>
                            </div>
                            <a class="forgot-pass" href="login.php">Already have an account? <strong>Sign in</strong> </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
      