<?php

$con = new mysqli("127.0.0.1", "dbadmin", "dbadmin@123", "users");

if ($con -> connect_error){
    die("Database Not Configured Properly");
}
else{
    //echo ("DB connection is established sir");
}

// register page secuure env.
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'dbadmin');
define('DB_PASSWORD', 'dbadmin@123');
define('DB_NAME', 'users');
 
/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>