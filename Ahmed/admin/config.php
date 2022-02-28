<?php

$dsn = "mysql:host=localhost;dbname=php_61";
$username = "root";
$password = "";

try{
    $con = new PDO($dsn , $username , $password);
    // echo "connect";
}catch(PDOException $e){
    echo $e;
}

?>