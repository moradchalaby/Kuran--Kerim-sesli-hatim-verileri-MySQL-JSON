<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kuran";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $DB = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "[HATA]: Veritabanı -".$e->getMessage();
}