<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>PPHOME LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
	
    <section>
        <div class="imgBx">
            <img src="images/bg.jpg">
        </div>
    
    <div class="header">
        <div class="formBx">
		    <h2>Login</h2>
	        <form method="post" action="login.php">
                <?php echo display_error(); ?>

		    <div class="input-group">
			    <label>Username</label>
			    <input type="text" name="username" >
		    </div>
		    <div class="input-group">
			    <label>Password</label>
			    <input type="password" name="password">
		    </div>
            <div class="remember">
                <label align="left" ><input type="checkbox" name="">remember me</label>
            </div>
           
		    <div class="container">
			    <button  type="submit" class="btn" name="login_btn" >Login</button>
		    </div>
            
            <p align=""  ><a href="#">Forgot Password?</a></p>
            <p >Don't have an account? <a href="signup.php">Sign up</a></p>
	        </form>
        </div>
    </div>
    </section>
</body>
</html>

