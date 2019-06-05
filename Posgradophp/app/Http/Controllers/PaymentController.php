<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use GuzzleHttp\Client;
use CybsSoapClient;

class PaymentController extends Controller
{
    public function index()
    {
        return view('account/carrito');
    }

    public function sign($params)
    {
        return $this->signData($this->buildDataToSign($params), env('BANK_SECRET_KEY'));
    }

    private function signData($data, $secretKey)
    {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }

    private function buildDataToSign($params)
    {
        $signedFieldNames = explode(",", $params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
            $dataToSign[] = $field . "=" . $params[$field];
        }
        return $this->commaSeparate($dataToSign);
    }

    private function commaSeparate($dataToSign)
    {
        return implode(",", $dataToSign);
    }

    private function GetCardType($card){


        if (substr($card, 0, 1 ) === "4") {
            return '001'; //VISA
        } elseif(substr($card, 0, 2 ) === "51" || substr($card, 0, 2 ) === "52" || substr($card, 0, 2 ) === "53" || substr($card, 0, 2 ) === "54" || substr($card, 0, 2 ) === "55") {
            return '002'; //MASTERCARD
        }elseif (substr($card, 0, 2 ) === "34" || substr($card, 0, 2 ) === "37") {
            return '003'; //American Express   
        }elseif(substr($card, 0, 4 ) === "6011" || substr($card, 0, 3 ) === "644" || substr($card, 0, 2 ) === "65"){
            return '004'; //Discover
        }elseif (substr($card, 0, 2 ) === "35" || substr($card, 0, 4 ) === "1800" || substr($card, 0, 4 ) === "2131") {
            return '007';
        }
    }

    public function pagar(PaymentRequest $request)
    {
        try {
            $bill_to_forename = $request->input('bill_to_forename');
            $bill_to_surname = $request->input('bill_to_surname');
            $bill_to_email = $request->input('bill_to_email');
            $bill_to_phone = $request->input('bill_to_phone');
            $bill_to_address_line1 = $request->input('bill_to_address_line1');
            $bill_to_address_city = $request->input('bill_to_address_city');
            $bill_to_address_state = $request->input('bill_to_address_state');
            $bill_to_address_country = $request->input('bill_to_address_country');
            $bill_to_address_postal_code = $request->input('bill_to_address_postal_code');
            $amount = $request->input('amount');
            
            $cardNumber = $request->input('card_number');
            $expirationMonth = $request->input('expirationMonth');
            $expirationYear = $request->input('expirationYear');

            $referenceCode = mt_rand(1000000, 9999999);

            $client = new CybsSoapClient();
            $request = $client->createRequest($referenceCode);

            $ccAuthService = new \stdClass();
            $ccAuthService->run = 'true';
            $request->ccAuthService = $ccAuthService;

            $ccCaptureService = new \stdClass();
            $ccCaptureService->run = 'true';
            $request->ccCaptureService = $ccCaptureService;

            $billTo = new \stdClass();
            $billTo->firstName = $bill_to_forename;
            $billTo->lastName = $bill_to_surname;
            $billTo->street1 = $bill_to_address_line1;
            $billTo->city = $bill_to_address_city;
            $billTo->state = $bill_to_address_state;
            $billTo->postalCode = $bill_to_address_postal_code;
            $billTo->country = $bill_to_address_country;
            $billTo->email = $bill_to_email;
            // $billTo->ipAddress = '10.7.111.111';
            $request->billTo = $billTo;

            $card = new \stdClass();
            $card->accountNumber = $cardNumber;
            $card->expirationMonth = $expirationMonth;
            $card->expirationYear = $expirationYear;
            $card->cardType=$this->GetCardType($cardNumber);
            $request->card = $card;

            $purchaseTotals = new \stdClass();
            $purchaseTotals->currency = 'USD';
            $purchaseTotals->grandTotalAmount = $amount;
            
            $request->purchaseTotals = $purchaseTotals;

            $reply = $client->runTransaction($request);

            // return response()->json(["resultado"=>$reply]);             
            if ($reply->decision != 'ACCEPT') {
                return response()->json(["resultado"=>'Error']);             
            }else{
                return response()->json(["resultado"=>'Exito']);
            }

        } catch (Exception $e) {
            return report($e);
        }
    
    }
}
