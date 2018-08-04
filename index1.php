<?php 
include 'connection/connect.php';
if(isset($_POST['upload_file'])){
    $file_name = $_FILES['img_file']['name'];
	$tmp_name  = $_FILES['img_file']['tmp_name'];
	$extension = array("jpeg","jpg","png","pdf","docx","doc");
	$ex        = explode(".", $file_name);
	$last      = end($ex);
	$errors    = array();
	if(!in_array($last, $extension)){
    $errors['invalid'] = "Invalid image extension";
	}else{
    $store     = "files/";// files are store here
    move_uploaded_file($tmp_name, "$store/$file_name");
    $Query = $db->query("INSERT INTO file(name) VALUES ('$file_name')");
    if($Query){
    	$errors['success'] = "Your file is successfully uploaded";
    }else{
    	$errors['query_not_word'] = "Your file is not work";

    }
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Upload</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 60px;">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<?php if(isset($errors)): ?>
							<ul>
								<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<input type="file" name="img_file" class="form-control" required="">
					</div><!-- form-group -->
					<div class="form-group">
						<input type="submit" value="Upload" name="upload_file" class="btn btn-success">
					</div><!-- form-group -->
				</form>
			</div><!-- col -->
		</div><!-- row -->
		<div class="row">
			<div class="col-md-8">
				<?php 

                function display_files(){
                	GLOBAL $db;
               $Display = $db->query("SELECT * FROM file ORDER BY id DESC");
    	if($Display->rowCount() == 0){
    		echo "Sorry we dont have any file";
    	}else{
    		echo "<table class='table'>
    		<tr>
            <th>Icon</th>
            <th>File</th>
            <th>Formate</th>

    		</tr>";

    		while($r = $Display->fetch(PDO::FETCH_OBJ)):
                 $file_name = $r->name;
                 $extension = explode(".", $file_name);
                 $ext = end($extension);
                 if($ext == "pdf"){
                 	echo "<tr>
                      <td><i class='fa fa-file-pdf-o'></td><td><a href='files/$file_name'>$file_name</a></td>
                      <td>PDF</td>
                 	</tr>";
                 }
                  if($ext == "docx" OR $ext == "doc"){
                 	echo "<tr>
                      <td><i class='fa fa-file-word-o'></td><td><a href='files/$file_name'>$file_name</a></td>
                      <td>DOCX</td>
                 	</tr>";
                 }
                  if($ext == "jpg" OR $ext == "jpeg"){
                 	echo "<tr>
                      <td><i class='fa fa-file-image-o'></td><td>
                      <img src='files/$file_name' style='width:60px;height:60px;'></td>
                      <td>JPG</td>
                 	</tr>";
                 }

    		endwhile;
    		echo "</table>";
    	}
                }
                display_files();
				 ?>
			</div>
		</div>
	</div><!-- container -->
</body>
</html>