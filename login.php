<?php
ob_start();
session_start();
require_once("dbconf.php");

if (!$_SESSION["username"]){
	header('Location:index.php');
}
else {
	header('Location:home.php');
}
ini_set('display_errors', 1);
?>

<html>
<head><title>SQL LAB </title>
</head>
<body>
<style>
body {
  background-color: lightblue;
}
h1 {
  color: black;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 20px;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: lightblue;
   color: red;
   text-align: center;
}
</style>

<center>
<h1> Login Please</h1><br><br><br>



    <form method="POST" autocomplete="off">
				Username:  <input type="text" id="uid" placeholder="Type username" name="uid"><br /></br />
				Password: <input type="password" id="pass"placeholder="Type password"  name="password">
			</p>
			<br />
			<p>
			<input type="submit" value="Submit"/> 
			<input type="reset" value="Reset"/>
			</p></div>
		</form>
		
		</center>

<?php

if (!empty($_REQUEST['uid'])) {
$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];

$q = "SELECT * FROM userlogin where username='".$username."' AND password = '".md5($pass)."'" ;
echo $q;
	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	$result = mysqli_query($con,$q);
	$row_cnt = mysqli_num_rows($result);
	if ($row_cnt > 0) {
	
	$row = mysqli_fetch_array($result);
	
	if ($row){
	//$_SESSION["id"] = $row[0];
	$_SESSION["username"] = $row[username];
	$_SESSION["name"] = $row[3];
	//ob_clean();
	
	header('Location:home.php');
	}
}
	else{
		echo "<center><font style=\"color:#FF0000\"><br \>Invalid password! <b>Try Harder<b> </font\>";
	}
}

?>

<div class="footer">
  <p>Code with ❤️ by @anir0y </p>
</div>
</body>
</html>