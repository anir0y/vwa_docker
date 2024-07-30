<?php
ob_start();
session_start();
header('hint: set cookie to Admin');

require_once("dbconf.php");
if (!$_SESSION["username"]){
	header('Location:index.php');
}
ini_set('display_errors', 1);
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greetings</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<?php include 'static/menu.php';?>

<div class="about">
<div class="inner-about">


<?php


if(($_COOKIE["Session_ID"]=="Admin")){
  echo "<h3>Your Flag is: Flag{Cookie_Tampering_4dmin}</h3>" ;
} else{
echo "<h3>Can you login as Admin?</h3>"; 
echo "Try to look into cookies and see if you can find the flag or find a hint";
}



?>

</div>
</div>
 
<div class="footer">
<?php include 'static/footer.php';?>
</body>
</html>