<?php
ob_start();
session_start();
include("dbconf.php");
ini_set('display_errors', 1);


if(isset($_COOKIE["Session_ID"])){
    //echo "Hi " . $_COOKIE["Session_ID"];
} else{
    echo "<script>alert('You are not authorized!r');</script>";


}
?>

<html>
<head><title>Find users </title>
</head>
<body>
<style>


html body{
  background-image: url(https://raw.githubusercontent.com/anir0y/cdn/main/2454628.png)
}

h2{
  color: blue;
}

#id{
  color: red;
  text-align: center;
}
div {
  margin-top: 30vh;
  margin-right: -45%;
  height: 200px;
  width: 50%;
  background-color: black;
  opacity: 90%;
  color: white;
}


#id{
  color: red;
  text-align: center;
}

.phpmsg{
  margin-top: -30vh;
  height: 200px;
  width: 50%;
  background-color: black;
}

</style>

<center>

<div >
<h1> Find users with ID</h1><br><br><br>
    <form method="GET" autocomplete="off">
			<input type="text" id="id" placeholder="Type UserID" name="id">
			<input type="submit" value="Submit"/> 
			<input type="reset" value="Reset"/>
			</p></div>
	</form>
</div>
</center>

<div class="phpmsg">
<?php
if(isset($_COOKIE["Session_ID"])){
    echo "Hi " . $_COOKIE["Session_ID"];
} else{
    echo "<script>alert('You are not authorized!');</script>";
}
$id = (isset($_GET['id']) ? $_GET['id'] : '');
//$id = $_REQUEST[ 'id' ]; 
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$q = "SELECT username FROM userlogin WHERE id = '$id'";
$result = mysqli_query($con,$q);
$row_cnt = mysqli_num_rows($result);

//echo $row_cnt;


if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<center><h2>Username is : " . $row["username"].  "<br></center></b>";
  }
} else {
  echo "<center><h2>Enter A valid UserID</center></h2>";
}

$con->close();

?>
<div>
</body>
</html>