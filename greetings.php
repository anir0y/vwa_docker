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
    <title>Greetings</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<?php include 'static/menu.php';?>

<div class="about">
<div class="inner-about">
<?php if(isset($_GET["name"])) : ?>

    <center> <h1>Hello, <?php echo $_GET["name"]; ?>! Have a good time!</h1></center>
    <?php endif; ?>

    <form action="<?php $_PHP_SELF ?>" method="GET">
    <center><h3>
    Name: <input type="text" name="name" />
    <input type="submit">
    </h3></center>
    




</div>
</div>
 
<div class="footer">
  <p>Code with ❤️ by @anir0y </p>   
</body>
</html>