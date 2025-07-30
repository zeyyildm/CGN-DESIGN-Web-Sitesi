<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Eğer form gönderilmişse işlem yap
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baglanti = mysqli_connect("localhost", "yeni_kullanici", "12345678", "alisveris-sepeti"); 

    if (!$baglanti) {
        die("Bağlantı hatası: " . mysqli_connect_error());
    }

    // Formdan gelen verileri al
    $kart_isim = mysqli_real_escape_string($baglanti, $_POST["kart_isim"]);
    $kart_numara = mysqli_real_escape_string($baglanti, $_POST["kart_numara"]);
    $son_kullanma = mysqli_real_escape_string($baglanti, $_POST["son_kullanma"]);
    $cvv = mysqli_real_escape_string($baglanti, $_POST["cvv"]);
    $adres = mysqli_real_escape_string($baglanti, $_POST["adres"]);
    $telefon = mysqli_real_escape_string($baglanti, $_POST["telefon"]);
    $email = mysqli_real_escape_string($baglanti, $_POST["email"]);

    // Veriyi tabloya ekle
    $sql = "INSERT INTO odeme (kart_isim, kart_numara, son_kullanma, cvv, adres, telefon, email) 
            VALUES ('$kart_isim', '$kart_numara', '$son_kullanma', '$cvv', '$adres', '$telefon', '$email')";

    if (mysqli_query($baglanti, $sql)) {
        echo "<script>alert('Ödeme başarıyla kaydedildi!'); window.location.href='fatura.php';</script>";
    } else {
        echo "Hata: " . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme - CGN Design</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .payment-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .card-icons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .card-icons img {
            height: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-form">
            <h2 class="text-center mb-4">Ödeme Bilgileri</h2>
            
            <form id="paymentForm" action="odeme.php" method="POST">
                <div class="form-group">
                    <label>Kart Üzerindeki İsim</label>
                    <input type="text" name="kart_isim" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Kart Numarası</label>
                    <input type="text" class="form-control" name="kart_numara" maxlength="16" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Son Kullanma Tarihi</label>
                        <input type="text" class="form-control" name="son_kullanma" placeholder="AA/YY" maxlength="5" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>CVV</label>
                        <input type="text" class="form-control" name="cvv" maxlength="3" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Adres</label>
                    <textarea class="form-control" name="adres" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="tel" class="form-control" name="telefon" required>
                </div>
                
                <div class="form-group">
                    <label>E-posta</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Ödemeyi Tamamla</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
