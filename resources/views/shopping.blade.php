<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Modern Mağaza Sayfası" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <title>USTAPOS - Mağaza</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Store Options -->
            <div class="col-md-8 store-options">
                <h3><i class="fas fa-store"></i> Mağaza Seçenekleri</h3>
                <form action="{{route('sale_confirmation')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mobilKullaniciSayisi" class="form-label"><i class="fas fa-users"></i> Mobil Kullanıcı Sayısı</label>
                        <select class="form-select" id="mobilKullaniciSayisi" name="mobilKullaniciSayisi" data-price-key="userCountPrice">
                            <option value="350">1 Kullanıcı</option>
                            <option value="500">5 Kullanıcı</option>
                            <option value="750">10 Kullanıcı</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="programTipi" class="form-label"><i class="fas fa-cogs"></i> Program Tipi</label>
                        <select class="form-select" id="programTipi" name="programTipi" data-price-key="programPrice">
                            <option value="0">Standart</option>
                            <option value="150">Pro</option>
                            <option value="300">Premium</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="extraFirma" class="form-label"><i class="fas fa-building"></i> Ekstra Firma</label>
                        <input type="number" class="form-control" id="extraFirma" name="extraFirma" placeholder="Firma Sayısı" min="0" value="0" data-price-key="extraFirmaPrice">
                    </div>
                    <hr>
                    <!-- SMS Paketleri -->
                    <h3><i class="fas fa-sms"></i> SMS Paketleri</h3>
                    <div class="sms-packages">
                        <div class="sms-package">
                            <h5><i class="fas fa-box"></i> Firma Aylık Program - 1 Kullanıcı</h5>
                            <p>Fiyat: 350 TL</p>
                            <button type="button" class="btn btn-primary btn-sm add-to-cart" data-name="Firma Aylık Program - 1 Kullanıcı" data-price="350">
                                <i class="fas fa-cart-plus"></i> Sepete Ekle
                            </button>
                        </div>
                        <!-- Diğer SMS Paketleri buraya eklenebilir -->
                    </div>
            </div>

            <div class="col-md-4 cart-section">
                <h3><i class="fas fa-shopping-cart"></i> Sepetim</h3>
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
                    <button type="submit" class="btn btn-primary w-100" id="confirmCart">
                        Devam Et <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>
<script>
//Basitleştirilmiş sepet mantığı 

/*
 *   
 * Uğurcan Yaş
 * Software Architect
 * 
 * 
 */


    $(document).ready(function() {
        const cart = [];
        const prices = {};

        function fetchPricesFromDB() {
            return new Promise((resolve) => {
                const priceData = {
                    userCountPrice: 150,
                    programPrice: 250,
                    extraFirmaPrice: 100
                };
                resolve(priceData);
            });
        }

        function initializePrices() {
            fetchPricesFromDB()
                .then(fetchedPrices => {
                    Object.assign(prices, fetchedPrices);
                    updateMainProduct();
                })
                .catch(error => console.error("Fiyatlar alınırken hata oluştu: ", error));
        }

        function updateCart() {
            let total = 0;
            let totalItems = 0;

            $('#cartItems').empty();

            cart.forEach(item => {
                $('#cartItems').append(`
                    <div class="cart-item">
                        <span class="cart-item-name">${item.name}</span>
                        <span class="cart-item-price">${item.price.toFixed(2)} TL</span>
                    </div>
                `);
                totalItems += item.quantity;
                total += item.price * item.quantity;
            });

            $('#totalItems').text(totalItems);
            $('#cartTotal').text(`${total.toFixed(2)} TL`);
            $('#cartItemsData').val(JSON.stringify(cart));
        }

        // Ana ürün fiyatını hesapla
        function calculateMainProductPrice() {
            const userCountPrice = parseFloat($('#mobilKullaniciSayisi').val()) || 0;
            const programPrice = parseFloat($('#programTipi').val()) || 0;
            const extraFirmaCount = parseInt($('#extraFirma').val()) || 0;
            const extraFirmaPrice = extraFirmaCount * (parseFloat(prices.extraFirmaPrice) || 0);

            return userCountPrice + programPrice + extraFirmaPrice;
        }

        // Ana ürünü güncelle
        function updateMainProduct() {
            const mainProductPrice = calculateMainProductPrice();
            const userCount = $('#mobilKullaniciSayisi').find('option:selected').text();
            const programType = $('#programTipi').find('option:selected').text();
            const extraFirmaCount = $('#extraFirma').val();

            const mainProductName = `Ana Ürün: <b>${userCount}</b><br> Program Tipi: <b>${programType}</b><br> Ekstra Firma: <b>${extraFirmaCount}</b>`;

            const existingProductIndex = cart.findIndex(item => item.name.startsWith('Ana Ürün:'));

            if (existingProductIndex > -1) {
                cart[existingProductIndex] = {
                    name: mainProductName,
                    price: mainProductPrice,
                    quantity: cart[existingProductIndex].quantity
                };
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
                cart[existingProductIndex].quantity += 1;
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

        initializePrices();
    });
</script>
