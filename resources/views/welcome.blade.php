<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satış Kayıt Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border-color: #ced4da;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0066cc;
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
        }

        .btn-custom {
            background-color: #0066cc;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #005bb5;
        }

        .hidden {
            display: none;
        }

        .sms-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin: 0 5px;
        }

        .sms-input:focus {
            border-color: #0066cc;
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
        }

        .navbar-custom {
            background-color: #0066cc;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }

        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color: #d0e0ff;
        }

        .navbar-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 6h16M4 12h16m-7 6h7'/%3e%3c/svg%3e");
        }
    </style>
</head>

<body>
    <div class="col-md-8 col-lg-6">
        <div class="card p-4">
            <!-- Step 1: User Information -->
            <div id="step1">
                <h3 class="text-center mb-4">Satış Kayıt Formu - Adım 1</h3>
                <form id="salesForm">
                    <div class="mb-3">
                        <label for="firmaTuru" class="form-label">Firma Türü *(Zorunlu)</label>
                        <select class="form-select" id="firmaTuru" name="firma_turu" required>
                            <option value="">Seçiniz</option>
                            <option value="Kurumsal">Kurumsal (A.Ş., LTD.ŞTİ., Şahıs Şirketleri vb.)</option>
                            <option value="Bireysel">Bireysel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="firmaAdi" class="form-label">Firma Adı *(Zorunlu)</label>
                        <input type="text" class="form-control" id="firmaAdi" name="firma_adi" placeholder="Firma Adı" required>
                    </div>
                    <div class="mb-3">
                        <label for="adSoyad" class="form-label">Ad Soyad *(Zorunlu)</label>
                        <input type="text" class="form-control" id="adSoyad" name="ad_soyad" placeholder="Ad Soyad" required>
                    </div>
                    <div class="mb-3">
                        <label for="cepTelefonu" class="form-label">Cep Telefonu *(Zorunlu)</label>
                        <input type="tel" class="form-control" id="cepTelefonu" name="cep_telefonu" placeholder="05xxxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label for="vergiTc" class="form-label">Vergi No / TC Kimlik No *(Zorunlu)</label>
                        <input type="text" class="form-control" id="vergiTc" name="vergi_tc" placeholder="Vergi No / TC Kimlik No" required>
                    </div>
                    <div class="mb-3">
                        <label for="vergiDairesi" class="form-label">Vergi Dairesi *(Zorunlu)</label>
                        <input type="text" class="form-control" id="vergiDairesi" name="vergi_dairesi" placeholder="Vergi Dairesi" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta *(Zorunlu)</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ornek@ornek.com" required>
                    </div>
                    <div class="d-grid">
                        <button type="button" class="btn btn-custom" id="sendSmsCode">İleri</button>
                    </div>
                </form>
            </div>

            <!-- Step 2: SMS Verification -->
            <div id="step2" class="hidden">
                <h3 class="text-center mb-4">SMS Doğrulama - Adım 2</h3>
                <form id="smsVerificationForm" action="{{ route('sales_verification') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-center">
                        <label for="smsCode" class="form-label">SMS Kodu *(Zorunlu)</label>
                        <div class="d-flex justify-content-center gap-2">
                            <input type="text" class="form-control sms-input" maxlength="1" pattern="\d" title="Bir rakam giriniz" required>
                            <input type="text" class="form-control sms-input" maxlength="1" pattern="\d" title="Bir rakam giriniz" required>
                            <input type="text" class="form-control sms-input" maxlength="1" pattern="\d" title="Bir rakam giriniz" required>
                            <input type="text" class="form-control sms-input" maxlength="1" pattern="\d" title="Bir rakam giriniz" required>
                            <input type="hidden" id="smsCode" name="sms_code">
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom" id="verifySmsCode">Doğrula ve Tamamla</button>
                    </div>
                </form>
            </div>

            <script>
                $('.sms-input').on('keyup', function(e) {
                    var input = $(this);
                    var smsCode = '';
                    if (input.val().length == input.prop('maxLength')) {
                        input.next('.sms-input').focus();
                    } else if (e.key === 'Backspace' && input.val().length === 0) {
                        input.prev('.sms-input').focus();
                    }
                    $('.sms-input').each(function() {
                        smsCode += $(this).val();
                    });

                    $('#smsCode').val(smsCode);
                });
            </script>

        </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    $(document).ready(function() {
        $('#sendSmsCode').on('click', handleSendSmsCode);
    });

    function handleSendSmsCode() {
        var formData = gatherFormData();

        $.ajax({
            url: '{{ route('create_sales') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    handleSuccess();
                } else {
                    handleError(response.message || 'Bilinmeyen bir hata oluştu.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                console.error('Full Response:', jqXHR.responseText);
                try {
                    var responseJson = JSON.parse(jqXHR.responseText);
                    console.error('Parsed JSON Response:', responseJson);
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: responseJson.message || 'Bir hata oluştu. Daha sonra tekrar deneyin.'
                    });
                } catch (e) {
                    console.error('Error parsing JSON response:', e);

                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Bir hata oluştu: ' + textStatus + ' - ' + errorThrown
                    });
                }
            }
        });
    }

    function gatherFormData() {
        return {
            firma_turu: $('#firmaTuru').val(),
            firma_adi: $('#firmaAdi').val(),
            ad_soyad: $('#adSoyad').val(),
            cep_telefonu: $('#cepTelefonu').val(),
            vergi_tc: $('#vergiTc').val(),
            vergi_dairesi: $('#vergiDairesi').val(),
            email: $('#email').val(),
            _token: $('meta[name="csrf-token"]').attr('content') 
        };
    }

    function handleSuccess() {
        $('#step1').addClass('hidden');
        $('#step2').removeClass('hidden');
    }

    function handleError(message) {
        Swal.fire({
            icon: 'error',
            title: 'Hata!',
            text: message
        });
    }
</script>



</body>

</html>