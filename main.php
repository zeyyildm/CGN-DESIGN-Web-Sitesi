<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGN Design</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&family=Inconsolata:wght@200&family=Oleo+Script:wght@400;700&family=Pacifico&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&family=Inconsolata:wght@200&family=Oleo+Script:wght@400;700&family=Orbitron:wght@400..900&family=Pacifico&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-wrapper">
        <div class="pembeyer">
            <img class="logo" src="gorseller/1.png" alt="" >
            <h1 class="yazi">CGN DESIGN</h1>
        </div>
        <form id="form">
            <div class="input-wrapper">
                <input id="aramaText" type="text" placeholder="  Arayınız..." style="font-style: italic">
                <button class="icon-button">
                    <i class="fas fa-search"></i>
                </button>
                <button class="icon3-button" onclick="openCart()">
                    <i class="fas fa-shopping-bag"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="urunler-wrapper">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="gorseller/görsel1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="gorseller/görsel2.png" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="urun-listesi">
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün1.jpeg" alt="Ürün 1" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">219.90</span>
                    <div>119.90</div>
                </div>
                <div class="urun-isim">Papatya Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün2.jpeg" alt="Ürün 2" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">239.99</span>
                    <div>119.90</div>
                </div>
                <div class="urun-isim">Şekil Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün3.jpeg" alt="Ürün 3" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">200</span>
                    <div>185.90</div>
                </div>
                <div class="urun-isim">Papatya Sarı Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün4.jpeg" alt="Ürün 4" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">264.90</span>
                    <div>250.90</div>
                </div>
                <div class="urun-isim">Deniz Kabuğu Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün5.jpg" alt="Ürün 5" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">201.99</span>
                    <div>112.90</div>
                </div>
                <div class="urun-isim">Baloncuk Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün6.jpeg" alt="Ürün 6" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">130.99</span>
                    <div>80.90</div>
                </div>
                <div class="urun-isim">Kasede Portakal Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün7.jpeg" alt="Ürün 7" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">129.90</span>
                    <div>110.90</div>
                </div>
                <div class="urun-isim">Kase Pembe Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün8.jpeg" alt="Ürün 8" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">200</span>
                    <div>123.90</div>
                </div>
                <div class="urun-isim">Pembe Baloncuk Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün9.jpeg" alt="Ürün 9" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">460.99</span>
                    <div>345.90</div>
                </div>
                <div class="urun-isim">Kalpli Pembe Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün10.jpeg" alt="Ürün 10" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">330.90</span>
                    <div>230.90</div>
                </div>
                <div class="urun-isim">Silüet Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün11.jpeg" alt="Ürün 11" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">210.99</span>
                    <div>100.90</div>
                </div>
                <div class="urun-isim">Bahçe Mum</div>
            </div>
            
            <div class="urun-item">
                <div class="urunler">
                    <img src="gorseller/ürün12.webp" alt="Ürün 12" />
                    <button class="icon2-button">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </div>
                <div class="urun-fiyat">
                    <span class="cizili">450.90</span>
                    <div>350.90</div>
                </div>
                <div class="urun-isim">Silüet İkili Set Mum</div>
            </div>
        </div>
    </div>

    <div id="overlay" class="overlay"></div>
    <div class="cardTab">
        <button class="close"><i class="fas fa-times"></i></button>
        <h1 class="sepetYazisi">Alışveriş Sepeti <span id="urunSayisi">(0)</span></h1>
        <ul class="sepettekiEsyalar">
        </ul>
        <div class="sepetCizgi"></div>
        <div class="toplamFiyat"> <span>Total: <span id="urunlerToplam">0</span> TL</span> </div>
        <div class="indirimKuponlari" style="margin-top: 15px;">
            <h3>Indirim Kuponları</h3>
            <button class="kuponBtn1" id="kupon10">10% Indirim Kuponu</button>
        </div>
        <div style="margin-top: 20px; text-align: center;">
            <button id="odemeButonu" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">Ödeme Yap</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
</body>
</html> 