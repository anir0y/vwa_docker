<?php 

//get name 
if ($phpname = $_GET["name"]) {
	echo '<center> <h1>Hello, '.  $phpname .'! Have a good time!</h1></center>'; 
	exit();
} 
?>
<html> 
<body> 
<form action="<?php $_PHP_SELF ?>" method="GET">
<center><h3>
Name: <input type="text" name="name" />
<input type="submit">
</h3></center>
</body>
</html>