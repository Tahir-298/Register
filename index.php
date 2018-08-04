<?php include 'connection/connect.php';
if(isset($_POST['signup'])){
	$name      = $_POST['name'];
	$email     = $_POST['email'];
	$password  = $_POST['password'];
	$confirm   = $_POST['confirm'];
	$reg       = "/^[a-zA-Z ]+$/";
	
	$errors    = array();
	if(empty($name)){
		$errors['name_error'] = "Name is required";
	} else if(!preg_match($reg, $name)){
		$errors['name_error'] = "Only Characters are allowed";
		$name = "";
	}
	if(empty($email)){
		$errors['email_error'] = "Email is required!";
	}else{
		$Email_check = $db->query("SELECT email FROM signup WHERE email = '$email'");
		if($Email_check->num_rows == 0){

		}else{
			$errors['email_error'] = "Sorry this email is already exist";
			$email = "";
		}
	}
	if(empty($password)){
		$errors['password_error'] = "Password is required";
	}else if(strlen($password) < 8){
		$errors['password_error'] = "Your password is too short";
		$password = "";
	}
	if(empty($confirm)){
		$errors['confirm_error'] = "Confirm password is required";
	}else if($confirm != $password){
		$errors['confirm_error'] = "Please confirm your password!";
		$confirm = "";
	}
	if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm)){
		$password = password_hash($password,PASSWORD_DEFAULT);
		$Query = $db->query("INSERT INTO signup (name,email,password) VALUES ('$name','$email','$password')");
		if($Query){
			header("location:success.php?signup_success='Your acccount is successfully created @ Tahrir!'");
		}else{
			echo "<script>alert('Sorry query not work')</script>";
		}
		
	}

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Signup && Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
		body {
			background: url('images/item/sunset.jpg');
		}
    	ul{
    		margin:0;
    		padding:0;
    	}
    	ul li{
    		margin:0;
    		padding: 0;
    		color:red;
    		list-style: none;
    	}
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
  <a class="navbar-brand" href="#">Singup & Login</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      	<a href="login.php" class="nav-link">login</a>
      </li>

      <li class="nav-item">
       
      </li>
    </ul>
    
  </div>
</div>
</nav>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h3>Create Account</h3>
				</div><!-- card-header -->
				<div class="card-body">
					<form action="" method="POST">
						<div class="form-group">
							<?php 
                            if(isset($errors)): ?>
                            <?php foreach($errors as $error_show): ?>
                            	<ul>
                            		<li><?php echo $error_show; ?></li>
                            	</ul>
                            <?php endforeach; ?>
                        <?php endif; ?>

						</div>
				  <div class="form-group">
				  	<input type="text" name="name" placeholder="Enter Name..." class="form-control" value="<?php if(isset($name)){ echo $name; }?>">
				  </div><!-- form-group -->
				  <div class="form-group">
				  	<input type="email" name="email" placeholder="Enter Email..." class="form-control" value="<?php if(isset($email)){ echo $email; }?>">
				  </div><!-- form-group -->
				  <div class="form-group">
				  	<input type="password" name="password" placeholder="Create Password..." class="form-control" value="<?php if(isset($password)){ echo $password; }?>">
				  </div><!-- form-group -->
				  <div class="form-group">
				  	<input type="password" name="confirm" placeholder="Confirm Password..." class="form-control" value="<?php if(isset($confirm)){ echo $confirm; }?>">
				  </div><!-- form-group -->
				  <div class="form-group">
				  	<input type="submit" name="signup" value="Create Account" class="btn btn-success btn-block">
				  </div><!-- form-group -->
			</form><!-- form -->
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col -->
	</div><!-- row -->
</div><!-- container -->
</body>
</html>