<?php
ob_start();
session_start();
require_once("dbconf.php");

if (!$_SESSION["username"]){
	header('Location:index.php');
}
ini_set('display_errors', 1);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file Upload portal</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>


<?php include 'static/menu.php';?>


<html>
<body>

<div class="about">
  <div class="inner-about"><center>
    <form action="fileuplaod.php" method="post" enctype="multipart/form-data" class="fileupload">
      <h1>Select File to upload:</h1> <br></br><br></br>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form><center>
</div>
</div>

<!-- file uploaded to /images-->



</body>
</html>