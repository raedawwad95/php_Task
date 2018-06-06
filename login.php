<?php 
include ('server.php');
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
                    <div role="tabpanel" class="tab-pane active form-are" id="login">
                        <form method="POST" action="login.php">
                            <?php 
                            include ('error.php')
                            ?>
                            <div class="form-bor">
                                <div class="form-input-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username">
                                </div>

                                <div class="form-input-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password">
                                </div>
                                <div class="form-input-checkbox">
                                    <input type="checkbox" id="test1" />
                                    <label for="test1">Keep me Signed in</label>
                                </div>
                                <div class="form-input-group">
                                    <button type="submit" class="btn"  name="login">Sing in</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
    