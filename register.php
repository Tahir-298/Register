<?php 
	session_start();
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "authentication");
	
	if (isset($_POST['register_btn'])) {
		session_start();
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		if ($password == $password2) {
			// create user
			$password = md5($password); //hash password before storing for security purpose
			$sql = "INSERT INOT users(username, email, password)VALUES('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now loged in";
			$_SESSION['username'] = $username;
			header("location: home.php");
		}else{
			//failed
			
			$_SESSION['message'] = "The two password do not match";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<div class="header">
			<h1>Register</h1>
		</div>
		<div class="container">
		<form>
			<div class="form-group" method="post" action="register.php">
				<label for="user">Username</label>
				<input type="text" name="username" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="email">Enter Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="pass">Password</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="pass">Password</label>
				<input type="password" name="passwords" class="form-control" required>
			</div>
			
				<input type="submit" name="register_btn">
		</form>
		</div>
	</body>
</html