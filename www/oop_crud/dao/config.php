<?php
$servername = "localhost";
$username = "root";
$password = "@12junj45p312R4f0n";

try {
    $db = new PDO("mysql:host=127.0.0.1;port=4306;dbname=oop_crud", $username, $password);
    // $db = new PDO("mysql:host=$servername;dbname=oop_crud", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>