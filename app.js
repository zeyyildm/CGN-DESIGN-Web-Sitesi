document.addEventListener("DOMContentLoaded", function() {
    // burada elementleri kullanabilmemiz için başta hepsini tek tek seçiyoruz.
    let sepetbuton = document.querySelector(".icon3-button");
    let overlay = document.querySelector(".overlay"); 
    let sepet = document.querySelector(".cardTab");
    let closeButton = document.querySelector(".close"); 
    let aramaCubugu = document.getElementById("form"); // Form elementini doğru seç
    let sepeteEkleİcon = document.querySelector(".icon2-button");
    let indirimkuponu1 = document.querySelector(".kuponBtn1");
    let indirimkuponu2 = document.querySelector(".kuponBtn2");

    runEvents();

    function runEvents() {
        aramaCubugu.addEventListener("submit", arama);
        sepeteEkleİcon.addEventListener("click",sepeteEkle);
    }

    // Sepet butonuna tıklanma olayı
    sepetbuton.addEventListener("click", function(e) {
        e.preventDefault(); 
        sepet.style.display = "block"; 
        overlay.style.display = "block"; 
    });

    document.getElementById("odemeButonu").addEventListener("click", function() {
        window.location.href = "odeme.php"; // Ödeme sayfası dosyanın adı
    });
    

    // kupon için butona tıklandığında ne olacağını tanıtıyoruz.
indirimkuponu1.addEventListener("click", function(){
    indirimUygula(10);
    indirimkuponu1.style.display = "none"; // Kuponu gizle, bir daha kullanılmasın.
});

    // Kapat butonuna tıklanma olayı
    closeButton.addEventListener("click", function() {
        sepet.style.display = "none"; 
        overlay.style.display = "none"; 
    });

    function arama(e) {
        e.preventDefault(); // Formun varsayılan davranışını engelle
        const aramaDegeri = document.getElementById("aramaText").value.toLowerCase().trim(); // Arama çubuğundan değeri al
        const urunListesi = document.querySelectorAll(".urun-isim");

        if (urunListesi.length > 0) {
            urunListesi.forEach(function(urun) {
                if (urun.textContent.toLowerCase().includes(aramaDegeri)) {
                    urun.parentElement.style.display = "block"; 
                } else {
                    urun.parentElement.style.display = "none"; 
                }
            });
        } 

        document.getElementById("aramaText").value="";
    }
});
let sepet = []; // Sepet dizisi
let toplamFiyat = 0; // Toplam fiyat

function sepeteEkle(e) {
    e.preventDefault();

    const urunItem = e.target.closest('.urun-item');
    let urunAdi = "";
    let urunFiyat = 0;

    if (urunItem) {
        urunAdi = urunItem.querySelector('.urun-isim').textContent;
        urunFiyat = parseFloat(urunItem.querySelector('.urun-fiyat div').textContent);
    }

    const mevcutUrun = sepet.find(urun => urun.adi === urunAdi);
    if (mevcutUrun) {
        mevcutUrun.sayi++; // Ürün sayısını artır
    } else {
        sepet.push({ adi: urunAdi, fiyat: urunFiyat, sayi: 1 }); // Yeni ürünü sepete ekle
    }

    toplamFiyat += urunFiyat; // Toplam fiyata ekle
    guncelleSepet(); // Sepeti güncelle
}

function guncelleSepet() {
    const urunListesi = document.querySelector(".sepettekiEsyalar");
    urunListesi.innerHTML = ""; // Önce mevcut listeyi temizle
    toplamFiyat = 0; // Toplam fiyatı sıfırla

    sepet.forEach(urun => {
        const li = document.createElement("li");
        li.className = "list-group-item";

        const sepetItemDiv = document.createElement("div");
        sepetItemDiv.className = "sepet-item"; // Flex ile konumlandır

        const urunSayisi = `(${urun.sayi})`; // Ürün sayısını tutan değişken
        const urunBilgisi = document.createElement("span");
        urunBilgisi.textContent = `${urunSayisi} ${urun.adi} ${urun.fiyat.toFixed(2)} TL`; // Ürün adını ve fiyatını birleştir

        // Artı ve eksi ikonlarını eklemek için
        const artıIkonu = document.createElement("i");
        artıIkonu.className = "fas fa-plus icon";
        artıIkonu.addEventListener('click', () => {
            urun.sayi++;
            guncelleSepet(); // Sepeti güncelle
        });

        const eksiIkonu = document.createElement("i");
        eksiIkonu.className = "fas fa-minus icon";
        eksiIkonu.addEventListener('click', () => {
            if (urun.sayi > 1) {
                urun.sayi--;
                guncelleSepet(); // Sepeti güncelle
            } else {
                sepet = sepet.filter(item => item.adi !== urun.adi); // Ürünü sepetten çıkar
                guncelleSepet(); // Sepeti güncelle
            }
        });

        // Elemanları div içine ekle
        sepetItemDiv.appendChild(urunBilgisi);
        sepetItemDiv.appendChild(eksiIkonu); // Eksi ikonunu ekle
        sepetItemDiv.appendChild(artıIkonu); // Artı ikonunu ekle

        li.appendChild(sepetItemDiv); // Sepet item div'ini li'ye ekle
        urunListesi.appendChild(li); // Sepet listesine ekle

        toplamFiyat += urun.fiyat * urun.sayi; // Toplam fiyatı güncelle
    });

    // Toplam fiyatı güncelle
    const toplamFiyatSpan = document.getElementById("urunlerToplam");
    toplamFiyatSpan.textContent = toplamFiyat.toFixed(2);
    // Toplam fiyatı göster

    // Ürün sayısını güncelle
    const sepetYazisi = document.querySelector(".sepetYazisi");
    sepetYazisi.textContent = `Alışveriş Sepeti (${sepet.length})`; // Sepet yazısını güncelle
}

document.querySelectorAll('.icon2-button').forEach(button => {
    button.addEventListener('click', sepeteEkle);
});

function indirimUygula(indirimYuzdesi) {
    const toplamFiyatSpan = document.getElementById("urunlerToplam");
    const mevcutToplam = parseFloat(toplamFiyatSpan.textContent);
    const indirimliFiyat = mevcutToplam - (mevcutToplam * (indirimYuzdesi / 100));
    toplamFiyatSpan.textContent = indirimliFiyat.toFixed(2);
}





