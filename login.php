<?php 
session_start();
include 'connection/connect.php';
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$errors = array();
	$query = $db->query("SELECT * FROM signup WHERE email = '$email'");
	if($query->num_rows == 0){
		$errors['wrong_email'] = "Enter correct email";
	}else{
		$r = $query->fetch_assoc();
		$hash_password = $r['password'];
		if(!password_verify($password, $hash_password)){
         $errors['password_wrong'] = "Your password is wrong";
		}else{
			$_SESSION['user_login'] = $email;
			header("location:home.php");
		}
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<style>
	body {
		background: url('images/item/sunset.jpg');
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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      	<a href="index.php" class="nav-link">Register</a>
      </li>

      <li class="nav-item">
       
      </li>
    </ul>
    
  </div>
</div>
</nav>
  <div class="container" style="margin-top: 50px;">
  	<div class="row">
  		<div class="col-md-4">
  			<h3>Login User</h3><hr>
  			<form action="" method="POST">
  				<div class="form-group">
  					<?php if(isset($errors)): ?>
  						<?php foreach($errors as $error): ?>
  							<ul>
  								<li>
  									<?php echo $error; ?>
  								</li>
  							</ul>
  						<?php endforeach; ?>
  					<?php endif; ?>
  				</div>
  				<div class="form-group">
  					<input type="email" name="email" placeholder ="Enter email..." class="form-control" required="">
  				</div>
  				<div class="form-group">
  					<input type="password" name="password" placeholder ="Enter Password..." class="form-control" required="">
  				</div>
  				<div class="form-group">
  					<input type="submit" name="login" value="Login" class="btn btn-success">
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
</body>
</html>
