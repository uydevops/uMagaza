<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Modern Mağaza Sayfası" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <title>Modern Mağaza Sayfası</title>
    <style>
        /* ... (Önceki stil kodları) ... */
    </style>
</head>


<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    .container {
        margin-top: 40px;
    }

    .store-options,
    .cart-section {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .store-options h3,
    .cart-section h3 {
        margin-bottom: 20px;
        color: #007bff;
        font-weight: 600;
    }

    .sms-packages {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .sms-package {
        flex: 1 1 calc(33.333% - 20px);
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .sms-package:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .sms-package h5 {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 600;
        color: #212529;
    }

    .sms-package p {
        margin-bottom: 15px;
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 8px 16px;
        font-size: 14px;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .cart-section {
        position: sticky;
        top: 20px;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
        transition: background-color 0.2s ease;
    }

    .cart-item:hover {
        background-color: #f8f9fa;
    }

    .cart-item-name {
        font-weight: 600;
        color: #212529;
    }

    .cart-item-price {
        color: #6c757d;
    }

    .cart-summary {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #dee2e6;
    }

    .cart-summary div {
        display: flex;
        justify-content: space-between;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .total-price {
        font-size: 20px;
        color: #28a745;
    }

    .form-label {
        font-weight: 600;
    }

    .form-select,
    .form-control {
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }

    .form-select option {
        color: #343a40;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <!-- Store Options -->
            <div class="col-md-8 store-options">
                <h3>Mağaza Seçenekleri</h3>
                <form action="{{route('sale_confirmation')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mobilKullaniciSayisi" class="form-label">Mobil Kullanıcı Sayısı</label>
                        <select class="form-select" id="mobilKullaniciSayisi" name="mobilKullaniciSayisi" data-price-key="userCountPrice">
                            <option value="350">1 Kullanıcı</option>
                            <option value="500">5 Kullanıcı</option>
                            <option value="750">10 Kullanıcı</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="programTipi" class="form-label">Program Tipi</label>
                        <select class="form-select" id="programTipi" name="programTipi" data-price-key="programPrice">
                            <option value="0">Standart</option>
                            <option value="150">Pro</option>
                            <option value="300">Premium</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="extraFirma" class="form-label">Ekstra Firma</label>
                        <input type="number" class="form-control" id="extraFirma" name="extraFirma" placeholder="Firma Sayısı" min="0" value="0" data-price-key="extraFirmaPrice">
                    </div>
                    <hr>
                    <!-- SMS Paketleri -->
                    <h3>SMS Paketleri</h3>
                    <div class="sms-packages">
                        <div class="sms-package">
                            <h5>Firma Aylık Program - 1 Kullanıcı</h5>
                            <p>Fiyat: 350 TL</p>
                            <button type="button" class="btn btn-primary btn-sm add-to-cart" data-name="Firma Aylık Program - 1 Kullanıcı" data-price="350">Sepete Ekle</button>
                        </div>
                    </div>
            </div>

            <div class="col-md-4 cart-section">
                <h3>Sepetim</h3>
                <div id="cartItems">

                </div>
                <div class="cart-summary">
                    <div>
                        <span>Toplam Ürün Adedi:</span>
                        <span id="totalItems">0</span>
                    </div>
                    <div>
                        <span>Toplam Tutar:</span>
                        <span id="cartTotal">0 TL</span>
                    </div>
                </div>

                <input type="hidden" id="cartItemsData" name="cartItemsData">
                <input type="hidden" name="id" value="{{$userInformation->id}}">

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100" id="confirmCart">Devam Et <i class="fas fa-arrow-right ms-2"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS ve bağımlılıkları -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery için DOM manipülasyonu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const cart = [];
            const prices = {};
            function fetchPricesFromDB() {
                return new Promise((resolve, reject) => {
                    const priceData = {
                        userCountPrice: 150,
                        programPrice: 250,
                        extraFirmaPrice: 100
                    };
                    resolve(priceData);
                });
            }

            function initializePrices() {
                fetchPricesFromDB().then(fetchedPrices => {
                    Object.assign(prices, fetchedPrices);
                    updateMainProduct();
                }).catch(error => {
                    console.error("Fiyatlar alınırken hata oluştu: ", error);
                });
            }

            function updateCart() {
                let total = 0;
                let totalItems = 0;

                $('#cartItems').empty();

                cart.forEach(item => {
                    $('#cartItems').append(
                        `<div class="cart-item">
                            <span class="cart-item-name">${item.name}</span>
                            <span class="cart-item-price">${item.price.toFixed(2)} TL</span>
                        </div>`
                    );
                    totalItems += item.quantity;
                    total += item.price * item.quantity;
                });

                $('#totalItems').text(totalItems);
                $('#cartTotal').text(total.toFixed(2) + ' TL');

                $('#cartItemsData').val(JSON.stringify(cart));
            }

            function calculateMainProductPrice() {
                const userCountPrice = parseFloat($('#mobilKullaniciSayisi').val()) || 0;
                const programPrice = parseFloat($('#programTipi').val()) || 0;
                const extraFirmaCount = parseInt($('#extraFirma').val()) || 0;
                const extraFirmaPrice = extraFirmaCount * (parseFloat(prices.extraFirmaPrice) || 0);

                return userCountPrice + programPrice + extraFirmaPrice;
            }

            function updateMainProduct() {
                const mainProductPrice = calculateMainProductPrice();
                const userCount = $('#mobilKullaniciSayisi').find('option:selected').text();
                const programType = $('#programTipi').find('option:selected').text();
                const extraFirmaCount = $('#extraFirma').val();

                const mainProductName = `Ana Ürün: <b>${userCount}</b><br> Program Tipi: <b>${programType}</b><br> Ekstra Firma: <b>${extraFirmaCount}</b>`;

                const existingProductIndex = cart.findIndex(item => item.name.startsWith('Ana Ürün:'));

                if (existingProductIndex > -1) {
                    cart[existingProductIndex].price = mainProductPrice;
                    cart[existingProductIndex].name = mainProductName;
                } else {
                    cart.push({
                        name: mainProductName,
                        price: mainProductPrice,
                        quantity: 1
                    });
                }

                updateCart();
            }

            function addToCart(name, price) {
                const existingProductIndex = cart.findIndex(item => item.name === name);

                if (existingProductIndex > -1) {
                    cart[existingProductIndex].quantity += 1; // Ürün miktarını artır
                } else {
                    cart.push({
                        name: name,
                        price: price,
                        quantity: 1
                    });
                }

                updateCart();
            }

            $('.add-to-cart').click(function() {
                const name = $(this).data('name');
                const price = parseFloat($(this).data('price'));
                addToCart(name, price);
            });

            $('#mobilKullaniciSayisi, #programTipi, #extraFirma').on('change input', function() {
                updateMainProduct();
            });

            // Sayfa yüklendiğinde fiyatları ve sepeti başlat
            initializePrices();
        });
    </script>


</body>

</html>