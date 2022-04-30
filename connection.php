<?php
// use to hide defualt massage error from php
// error_reporting(0);

$server_name = "139.394.249";
$user_name = "username";
$pass = "password";
$db_name = "db_name";

// function mysqli_connect() 
// object mysqli 
$connection = new mysqli($server_name, $user_name, $pass, $db_name);

// connect_erro and connect_errno is property in mysqli object 
// 0 is falsy value in PHP

// show erro code
if ($connection->connect_errno) {
    // show erro description
    echo "Connectio failed" . $connection->connect_erro;
    exit();
}

?>
