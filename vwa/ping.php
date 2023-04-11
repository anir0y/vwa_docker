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
error_reporting(0);

// add badwords list 
$badwords = array(";", "||", "| ");

if ($rhost = ($_POST["rhost"])) {
        // check rhost for bad words
        if (str_replace($badwords, "", $_POST["rhost"]) != $_POST["rhost"]) {
                echo "Bad words detected";
                exit();
        }
        else{
        exec("ping -c 4 ". $rhost, $output, $result);
        print_r($output);
        //
        //print_r($output);

        if($result ==0)
                echo "<center><h1>Host is ONLINE</h1><center>";

        else
                echo "<center><h1>Host is OFFLINE</h1><center>";
        exit();
} }
?>
<html> 
<body> 
<form action="<?php $_PHP_SELF ?>" method="POST">
<center><h3>Ping host or IP: <input type="text" name="rhost" />

<input type="submit">
</h3></center>
</body>
</html>
<?php include 'static/footer.php';?>