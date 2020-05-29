<?php

$host = "localhost";
$dbname = "id12852215_shopping";
$uname = "id12852215_rana";
$pass = "rana2522";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed";
}
