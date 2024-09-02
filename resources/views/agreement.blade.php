<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="USTAPOS Halı Otomasyon Sistemi Sözleşmesi" />
    <title>USTAPOS Halı Otomasyon Sistemi Sözleşmesi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

<style>
    body {
    background-color: #f8f9fa;
}

.container-fluid {
    margin-top: 20px;
}

.contract-content {
    border: 1px solid #dee2e6;
    padding: 20px;
    background: #ffffff;
    color: #333;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    max-height: 600px;
    overflow-y: auto;
}

.contract-content h4 {
    margin-bottom: 20px;
}

.contract-section,
.contract-subsection,
.contract-subsubsection {
    margin-top: 10px;
    padding-left: 20px;
}

.contract-subsection {
    padding-left: 40px;
}

.contract-subsubsection {
    padding-left: 60px;
}

.signature-box {
    width: 49%;
    height: 60px;
    border: 1px solid #333;
    border-radius: 4px;
    text-align: center;
    line-height: 60px;
    margin-bottom: 20px;
    background: #f1f1f1;
}

.print-button {
    margin-top: 20px;
    text-align: center;
}

.approval-text {
    text-align: center;
    margin-top: 20px;
}

@media print {
    body {
        margin: 0;
        padding: 0;
    }

    .container-fluid {
        margin: 0;
    }

    .contract-content {
        border: none;
        box-shadow: none;
        margin: 0;
        height: auto;
        overflow: visible;
    }

    .contract-section,
    .contract-subsection,
    .contract-subsubsection {
        padding-left: 0;
    }

    .signature-box {
        width: 49%;
        height: 60px;
        border: 1px solid #333;
        margin-bottom: 20px;
    }

    .print-button {
        display: none;
    }

    @page {
        size: A4;
        margin: 10mm;
    }

    .contract-content,
    .contract-section,
    .contract-subsection,
    .contract-subsubsection {
        page-break-inside: avoid;
    }
}

</style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contract-content" id="printDiv">
                    <h4 class="text-center">USTAPOS HALI OTOMASYON SİSTEMİ SÖZLEŞMESİ</h4>

                    <p><strong>1. TARAFLAR:</strong></p>
                    <div class="contract-section">1.1. {{$companyInformation->ad_soyad}} - {{$companyInformation->firma_adi}} (Bundan sonra ALICI olarak anılacaktır)</div>
                    <div class="contract-section">1.2. KORÇAY KÖYBAŞI - Altf4 Yazılım Reklam Danışmanlık (Bundan sonra ALTF4 YAZILIM olarak anılacaktır)</div>

                    <p><strong>2. SATILAN ÜRÜNLER:</strong></p>
                    <div class="contract-section">2.1. Program: USTAPOS HALI OTOMASYON SİSTEMİ</div>
                    <div class="contract-section">2.2. Kullanıcı Sayısı: 1</div>

                    <p><strong>3. KONULAR:</strong></p>
                    <div class="contract-section">3.1. ALTF4 YAZILIM, bu sözleşmeyle satışı yapılan yazılımların (bilgisayar programlarının) kullanım hak ve yetkisini ALICI’ya verir.</div>

                    <p><strong>4. KARŞILIKLI TAAHHÜTLER:</strong></p>
                    <div class="contract-section">4.1. Sözleşmenin tarafları olarak hareket eden ALTF4 YAZILIM ve ALICI aşağıda belirten hak ve yükümlülüklerini karşılıklı olarak taahhüt edip kabul ve imza etmişlerdir.</div>
                    <div class="contract-section">4.2. ALTF4 YAZILIM: USTAPOS HALI OTOMASYON SİSTEMİ</div>
                    <div class="contract-subsection">4.2.1. İkinci Maddede belirtilen ürünleri, ALICI’nın bilgisayarına yüklemek, yazılım hatalarına karşı çıkabilecek sorunlarda ekteki garanti belgesinde belirlenen koşul ve süreler içinde ücretsiz, daha sonrasında ise ücret karşılığı da olsa ALICI’ya destek sağlamak ve verilmesi zorunlu olan program eğitimini vermekle sorumludur.</div>
                    <div class="contract-subsection">4.2.2. Eğitim: USTAPOS HALI OTOMASYON SİSTEMİ UZAKTAN EĞİTİM</div>
                    <div class="contract-subsubsection">• ALICI, ikinci maddede belirtilen ürünler için, standart program eğitimi ya da ek eğitim taleplerinde bulunabilir. ALTF4 YAZILIM, ALICIDAN gelecek eğitim taleplerini en kısa sürede karşılamakla yükümlüdür. Eğitim karşılıklı anlaşmaya bağlı olarak, ALICI’nın iş yerinde veya ALTF4 YAZILIM iş yerinde olabilir. Eğitimin, ne zaman, ne sürede ve hangi kapsamda olacağı ALTF4 YAZILIM ve ALICI tarafından birlikte belirlenir.</div>

                    <div class="row">
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                    </div>

                    <div class="contract-subsubsection">• ALICI, çalışanların eğitiminin sürekliliğini sağlamakla sorumludur. Eğitim amaçlı olarak Alıcı’nın iş yerine gelen, eğiticiye yeteri kadar zaman ayrılmaması veya geldiği halde eğitimi verememesi gibi durumlarda, eğitim çalışması yapılmış sayılır.</div>
                    <div class="contract-subsubsection">• Eğitim hizmetleri, yerinde istenmesi halinde destek sözleşmelerinde belirtilen fiyatlar ile ücretlendirilir. Program kullanım süresince uzaktan eğitim ücretsizdir.</div>
                    <div class="contract-subsubsection">• Yerinde eğitim talebi halinde yol ikamet adresi ücretleri ve günlük 100$+ KDV eğitim ücretleri fatura edilecektir.</div>
                    <div class="contract-subsubsection">• Program teslim süresi sözleşme tarihinden itibaren 1 haftadır.</div>
                    <div class="contract-subsubsection">• ALICI yazılım teslim edildiği 30 günden itibaren memnuniyetsizlik halinde kullanım süresinin haricinde ücret ödemeksizin sözleşme iptal edilebilir. Aksi halde alıcı programı sözleşme süresi boyunca kullanmayı taahhüt eder.</div>
                    <div class="contract-subsubsection">• ALICI, bu sözleşme ile kendisine tanınmış hak, sorumluluk ve yetkileri, hiçbir şekilde başka kişi veya kuruluşlara devredemez. ALTF4 YAZILIM adına ya da hesabına üçüncü bir şahısla bir işlem ya da anlaşma yapamaz. Herhangi bir taahhütte bulunamaz.</div>
                    <div class="contract-subsubsection">• ALICI, hiçbir şekilde ürünleri oluşturan yazılım ve diğer belgeleri (CD, kitap, kullanım kılavuzu vb. gibi) kiralayamaz, kopyalayamaz, ücretli ya da ücretsiz bir şekilde dağıtamaz.</div>

                    <p><strong>5. ÖDEME:</strong></p>
                    <div class="contract-section">5.1. İkinci maddede belirtilen ürünler, aşağıdaki ödeme tablosundaki bilgilere göre ALICI’ya satılmıştır.</div>
                    <div class="contract-section">5.2. Müşteri fiyatlarında cihazlar bedele dahil olmayıp ekstra cihaz ve farklı model seçiminde müşteriye ayrı olarak cihaz faturalandırma işlemi gerçekleştirecektir.</div>
                    <div class="contract-section">5.3. Müşteri bu sözleşme ile aşağıda belirtilen süre için teknik destek ve server kullanımı ücretsiz olup kullanım devam etmesi halinde bir sonraki yıllar için server ve destek ücreti ALTF4 YAZILIM tarafından belirlenen fiyat üzerinden faturalandırılacaktır.</div>

                    <div class="row">
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                    </div>

                    <p><strong>6. ÖDEME KOŞULLARI:</strong></p>
                    <div class="contract-section">6.1. ALICI, satın aldığı yazılımın bedelini sözleşmede belirtilen ödeme koşullarına uygun olarak ödeyecektir.</div>
                    <div class="contract-section">6.2. Ödemeler, belirtilen tarihlerde yapılacaktır ve bu tarihler geçerlidir.</div>
                    <div class="contract-section">6.3. ALICI, ödeme işlemlerini sözleşmede belirtilen süre ve koşullara uygun olarak eksiksiz yapmakla yükümlüdür. Ödeme gecikmelerinde geç ödeme faiz oranı uygulanacaktır.</div>

                    <p><strong>7. YAZILIM GARANTİSİ:</strong></p>
                    <div class="contract-section">7.1. ALTF4 YAZILIM, ürünlerin kullanımından kaynaklanacak hatalardan sorumlu değildir. ALICI, yazılımdaki raporların ya da verilerin hatalı olduğunu; bu verilere bakarak yanlış kararlar aldığını ve zarara uğradığını öne süremez.</div>
                    <div class="contract-section">7.2. ALTF4 YAZILIM, Sistem Bilgilerinin güvenliğini sağlamak sorumluluğundadır. Aksi halde müşterinin oluşabilecek zararlarını ödeme sorumluluğundadır.</div>
                    <div class="contract-section">7.3. ALTF4 YAZILIM, ALICI’nın ürünleri, yasalara aykırı biçimde kullanmasından sorumlu değildir.</div>
                    <div class="contract-section">7.4. Yazılım sisteminin konusuna giren yasa, yönetmelik veya diğer mevzuat, uygulama ve raporlarda değişiklik olması ya da çeşitli nedenlerle ALICI tarafından programda değişiklik ya da programa ek yapılmasının istenmesi durumunda, bu işlemlerin gerçekleştirilip gerçekleştirilmeyeceğine ALTF4 YAZILIM karar verir. Yapılacak değişiklik ve ekler ayrıca fiyatlandırılır.</div>


                    <div class="row">
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                        <div class="col-6 signature-box">KAŞE/İMZA</div>
                    </div>


                    <p><strong>8. FESİH:</strong></p>
                    <div class="contract-section">8.1. Taraflar aşağıda belirtilen sebeplerin varlığında sözleşmeyi fesih etme hakkına sahiptir.</div>
                    <div class="contract-subsection">• ALICI’nın ALTF4 YAZILIM ya olan borçları ile ilgili temerrüde düşmesi halinde,</div>
                    <div class="contract-subsection">• Tarafların sözleşme hükümlerine aykırı davranması halinde,</div>
                    <div class="contract-subsection">• ALICI’nın ticari işletmesini devretmesi halinde,</div>
                    <div class="contract-subsection">• ALTF4 YAZILIM’ın, ticari faaliyetlerinin T.T.K. ’da belirtilen biçimlerde sona ermesi halinde</div>
                    <div class="contract-section">8.2. Bu sözleşmeden doğan anlaşmazlıkların çözümde Adana Mahkemeleri ve İcra Daireleri yetkilidir.</div>
                    <div class="contract-section">8.3. 8 (Sekiz) ana maddeden oluşan bu sözleşme aşağıda belirtilen tarihte, 2 (iki) nüsha halinde düzenlenmiş olup, taraflarca imzalanıp teslim alınmıştır.</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Paket Adı</th>
                                <th>Fiyat</th>
                                <th>Toplam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>USTAPOS HALI OTOMASYON SİSTEMİ</td>
                                <td>1.000,00 TL</td>
                                <td>1.000,00 TL</td>
                            </tr>
                        </tbody>
                    </table>

                     <div class="row" style="margin-top: 20px;">
                        <div class="col-4 signature-box">Tarih</div>
                        <div class="col-4 signature-box">Korçay Köybaşı | ALTF4 YAZILIM</div>
                        <div class="col-4 signature-box">ALICI</div>
                     </div>


                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="modal-footer justify-content-between">
                    <!-- Onay kutusu -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Okudum ve onaylıyorum</label>
                    </div>
                    <button class="btn btn-primary" onclick="printContent('printDiv')">Yazdır</button>
                    <input type="submit" class="btn btn-success" value="Devam Et" style="display: none;">
                </div>
            </div>
        </div>
    </div>

    <script>
        // Onay kutusu kontrolü
        document.getElementById('inlineCheckbox1').addEventListener('change', function() {
            document.querySelector('.btn-success').style.display = this.checked ? 'block' : 'none';
        });
    </script>

    <script>
        function printContent(el) {
            var restorePage = document.body.innerHTML;
            var printContent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorePage;
        }
    </script>
</body>

</html>