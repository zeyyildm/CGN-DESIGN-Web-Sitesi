<?php
session_start(); // Oturum başlatma

// Eğer kullanıcı giriş yapmışsa
if (isset($_SESSION["username"])) {
    echo "<h3>Hoşgeldiniz, " . $_SESSION["username"] . "!</h3>";
    echo "<a href='cikis.php' style='color:white;background-color:black;'>ÇIKIŞ YAP</a>";

    // "Randevu Al" yazısı ve yönlendirme linki
    echo "<br><br><a href='randevu.php' style='color:white;background-color:green;padding:10px;border-radius:5px;'>Randevu Al</a>";

} else {
    // Giriş yapılmamışsa, mesaj göster
    echo "Bu sayfayı görüntüleyemezsiniz! Önce giriş yapın.";
}

$host = 'localhost'; // Veritabanı sunucusu
$dbname = 'uyelik'; // Veritabanı adı
$username = 'yeni_kullanici'; // Kullanıcı adı
$password = '12345678'; // Şifre (phpMyAdmin varsayılan şifre boş olabilir)

try {
    // PDO ile veritabanı bağlantısı
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>