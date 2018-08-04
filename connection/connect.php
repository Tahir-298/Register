<?php 
$db = new mysqli("localhost","root","","php_crud");
if($db->connect_error){
	echo "Connection".$db->connect_error;
}


 ?>