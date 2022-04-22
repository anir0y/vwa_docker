<?php
ob_start();
session_start();
require_once("dbconf.php");

if (!$_SESSION["username"]){
	header('Location:index.php');
}
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<body>
<center>
<form action="fileuplaod.php" method="post" enctype="multipart/form-data">
  Select File to upload: <br></br><br></br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</center>
</body>
</html>