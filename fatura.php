<?php

$servername = "localhost";
$username = "yeni_kullanici";
$password = "12345678";
$dbname = "alisveris-sepeti";
$baglanti = mysqli_connect($servername, $username, $password, $dbname);

if (!$baglanti) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

$sql = "SELECT * FROM odeme ORDER BY id DESC LIMIT 1";
$result = $baglanti->query($sql); // döndürülen sonuçları tutar

if ($result === false) { // eğer sorgu çalışmadıysa
    echo "Hata oluştu: " . $baglanti->error;
} else {
    // Veri çekme ve yazdırma işlemleri
    if ($result->num_rows > 0) { // en az bir satır veri döndüyse
        $row = $result->fetch_assoc();
    } else {
        echo "Veri bulunamadı";
    }
}

$baglanti->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura - CGN Design</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .invoice-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .invoice-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .invoice-logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin: 30px 0;
        }
        .invoice-table {
            width: 100%;
            margin: 20px 0;
        }
        .invoice-table th {
            background-color: #f8f9fa;
        }
        .total-section {
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }
        .print-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-container">
            <div class="invoice-header">
                <div class="row">
                    <div class="col-md-6">
                        <img src="gorseller/1.png" alt="CGN Design Logo" class="invoice-logo">
                        <h2>CGN Design</h2>
                        <p>Telefon: +90 123 456 78 91</p>
                        <p>E-posta: info@cgndesign.com</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3>FATURA</h3>
                        <p>Fatura No: #<span id="faturaNo"></span></p>
                        <p>Tarih: <span id="faturaTarihi"></span></p>
                    </div>
                </div>
            </div>

            <div class="invoice-details">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Müşteri Bilgileri</h4>
                        <p>Ad Soyad: <span id="musteriAdi"><?php echo $row["kart_isim"]; ?></span></p>
                        <p>E-posta: <span id="musteriEmail"><?php echo $row["email"]; ?></span></p>
                        <p>Telefon: <span id="musteriTelefon"><?php echo $row["telefon"]; ?></span></p>
                        <p>Adres: <span id="musteriAdres"><?php echo $row["adres"]; ?></span></p>
                    </div>
                </div>
            </div>

            <table class="table invoice-table">
                <thead>
                    <tr>
                        <th>Ürün</th>
                        <th>Adet</th>
                        <th>Birim Fiyat</th>
                        <th>Toplam</th>
                    </tr>
                </thead>
                <tbody id="urunListesi">
                    <!-- Ürünler buraya dinamik olarak eklenecek -->
                    <tr>
                        <td>Örnek Ürün 1</td>
                        <td>1</td>
                        <td>100 TL</td>
                        <td>100 TL</td>
                    </tr>
                    <tr>
                        <td>Örnek Ürün 2</td>
                        <td>2</td>
                        <td>50 TL</td>
                        <td>100 TL</td>
                    </tr>
                </tbody>
            </table>

            <div class="total-section">
                <div class="row">
                    <div class="col-md-6 offset-md-6">
                        <table class="table">
                            <tr>
                                <td>Ara Toplam:</td>
                                <td class="text-right"><span id="araToplam">200.00</span> TL</td>
                            </tr>
                            <tr>
                                <td>KDV (%18):</td>
                                <td class="text-right"><span id="kdv">36.00</span> TL</td>
                            </tr>
                            <tr>
                                <td><strong>Genel Toplam:</strong></td>
                                <td class="text-right"><strong><span id="genelToplam">236.00</span> TL</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="text-center print-button">
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="fas fa-print"></i> Yazdır
                </button>
                <a href="main.php" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Ana Sayfaya Dön
                </a>
            </
