<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesRecords;
use GuzzleHttp\Client; // Guzzle HTTP Client

class SalesController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://api.mesajpaneli.com',
            'timeout'  => 30,
        ]);
    }

    public function create_sales(Request $request)
    {
        $randomNumber = rand(1000, 9999);

        $data = $request->except('_token');

        $data['sms_verified'] = 0;
        $data['sms_verification_code'] = $randomNumber;

        try {
            $sales = SalesRecords::create($data);
            if ($sales) {
                $phoneNumber = $data['cep_telefonu'];
                $message = "SMS Doğrulama Kodunuz: " . $randomNumber;

                $verificationCodeSent = $this->sendSmsVerification($phoneNumber, $message);

                return response()->json([
                    'success' => true,
                    'message' => 'Satış kaydı başarıyla oluşturuldu. Lütfen SMS kodunu doğrulayın.',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error in create_sales: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }

        return response()->json(['success' => false, 'message' => 'Satış kaydı oluşturulamadı.']);
    }



    public function sales_verification(Request $request)
    {
        $sms_code = $request->input('sms_code');

        $sales = SalesRecords::where('sms_verification_code', $sms_code)->first();

        if ($sales) {
            $sales->sms_verified = 1;
            $sales->save();

            return $this->shopping($sales);
        } else {
            return response()->json(['success' => false, 'message' => 'SMS doğrulama kodu hatalı.']);
        }
    }


    public function shopping($userInformation)
    {

        $this->data['userInformation'] = $userInformation;
        return view('shopping', $this->data);
    }

    public function saleConfirmation(Request $request)
    {
        $this->data['companyInformation'] = SalesRecords::where('id', $request->input('id'))->first();
    
        $cartItems = $request->input('cartItemsData'); 
        $cartItemsArray = json_decode($cartItems, true);
        
        $formattedCartItems = [];
    
        if (is_array($cartItemsArray)) {
            foreach ($cartItemsArray as $item) {
                preg_match('/Ana Ürün:<b>(.*?)<\/b>/', $item['name'], $anaUrunMatches);
                preg_match('/Program Tipi: <b>(.*?)<\/b>/', $item['name'], $programTipiMatches);
                preg_match('/Ekstra Firma: (.*?)$/', $item['name'], $ekstraFirmaMatches);
    
                $formattedCartItems[] = [
                    'ana_urun' => isset($anaUrunMatches[1]) ? trim($anaUrunMatches[1]) : '',
                    'program_tipi' => isset($programTipiMatches[1]) ? trim($programTipiMatches[1]) : '',
                    'ekstra_firma' => isset($ekstraFirmaMatches[1]) ? trim($ekstraFirmaMatches[1]) : '',
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];
            }
        } else {
            return back()->withErrors(['cartItemsData' => 'Invalid cart items data format.']);
        }
    
        $this->data['cartItems'] = $formattedCartItems;
    
        dd($this->data['cartItems']);
    
        return view('agreement', $this->data);
    }
    

    private function sendSmsVerification($phoneNumber, $message)
    {
        try {
            $response = $this->client->post('/index.php', [
                'form_params' => [
                    'islem' => 1,
                    'user' => '',
                    'pass' => '',        
                    'mesaj' => $message,
                    'numaralar' => $phoneNumber,
                    'baslik' => 'HALI YIKAMA'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return false;
        }
    }
}
