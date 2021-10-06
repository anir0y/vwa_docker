<?php 

//ping IP/Domain
if ($rhost = $_GET["rhost"]) {
	exec("ping -c 4 ". $rhost, $output, $result);
	print_r($output);
	//
	print_r($output);

	if($result ==0)
		echo "<center><h1>Host is ONLINE</h1><center>";

	else
		echo "<center><h1>Host is OFFLINE</h1><center>";
exit();
} 
?>
<html> 
<body> 
<form action="<?php $_PHP_SELF ?>" method="GET">
<center><h3>
Name: <input type="text" name="rhost" />

<input type="submit">
</h3></center>
</body>
</html>