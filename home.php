<?php 
session_start();
if(isset($_SESSION['user_login']))
{
echo "<h1>Welcome user</h1><a href='logout.php'>logout</a>";
}else{
	header("location:login.php");
}


 ?>
 
 <div class""><h1>Welcome <?php echo $_SESSION['user_login'];  ?></div></h1>