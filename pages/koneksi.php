<?php
function connect()
{
    $host = "localhost";
    $username = "root";
    $password = "12345";
    $conn = new PDO("mysql:host=$host;dbname=toko-satu", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
?>