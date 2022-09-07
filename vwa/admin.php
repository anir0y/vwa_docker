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

if(($_COOKIE["Session_ID"]=="Arishti-Admin")){
    echo "Hi " . $_COOKIE["Session_ID"];
    echo "<h3>Your Flag is: Flag{" .sha1("adminflag"). " }</h3>" ;
} else{
  echo "<h3>Can you login as Admin?</h3>" ;

    


}

?>


</div>
</div>
 
<div class="footer">
  <p>Code with ❤️ by @anir0y </p>   
</body>
</html>