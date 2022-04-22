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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<style>
html {
  height: 100%;
}
body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  background-color: #f2f2f2;
  height: 100%;
  overflow: hidden;
}
.menu {
  height: 60pt;
  width: 100%;
  padding-left: 12pt;
  background-color: #fff;
  position: fixed;
  display: flex;
  align-items: center;
  box-shadow: 0pt 0pt 30pt rgba(0,0,0,0.2);
}
.menu a {
  margin-right: 12pt;
  font-size: 13pt;
  text-decoration: none;
}
.menu a:link, .menu a:visited {
  color: #1c1c1c;
}
.about {
  background-color: #6233FF;
  color: #fff;
  height: calc(100% - 60pt);
  padding-top: 60pt;
  display: flex;
  align-items: center;
  justify-content: center;
}
.inner-about {
  width: 100%;
  max-width: 600pt;
  padding: 10pt;
}
.inner-about h1 {
  margin: 0;
  font-size: 35pt;
  margin-bottom: -10pt;
}
.inner-about p {
  margin: 0;
  margin-bottom: 8pt;
  font-size: 15pt;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #6233FF;
   color: white;
   text-align: center;
}
</style>

<div class="menu">
  <a href="upload.php">File Upload</a>
  <a href="logout.php">Log Out</a>
  <a href="search.php">find users</a>
</div>
<div class="about">
  <div class="inner-about">
    <?php 
    echo "<h2> Your userID is: " . $_SESSION['username'] . "</h2>";
    echo "Your Unique Flad ID: " .sha1($_SESSION['username']). " !" ;
    ?>
    <br><hr><br>
    <h1>You Did it!</h1><br>
    <p>You Completed this task Successfully</p>
  </div>
</div>
 
<div class="footer">
  <p>Code with ❤️ by @anir0y </p>   
</body>
</html>