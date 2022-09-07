<?php
session_start();
session_destroy();
header('Location:index.php');
setcookie("Session_ID", "", time()-3600);

?>