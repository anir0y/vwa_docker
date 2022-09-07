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
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<?php include 'static/menu.php';?>

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