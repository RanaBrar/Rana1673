<?php

$host = "localhost";
$dbname = "id12852215_shopping";
$uname = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed";
}
