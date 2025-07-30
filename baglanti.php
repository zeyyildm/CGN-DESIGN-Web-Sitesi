<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = "localhost";
$username = "yeni_kullanici";
$password = "12345678";
$vt = "alisveris-sepeti";

try {
    $baglanti = new mysqli($servername, $username, $password, $vt);
    mysqli_set_charset($baglanti, "UTF8");
    
    if ($baglanti->connect_error) {
        throw new Exception("Veritabanı bağlantı hatası: " . $baglanti->connect_error);
    }
} catch (Exception $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}
?>