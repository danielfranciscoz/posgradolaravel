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

    public function pagar(Request $request)
    {
        $access_key = env('BANK_ACCESS_KEY');
        $profile_id = env('BANK_PROFILE_ID');
        $transaction_type = 'authorization';
        $reference_number = mt_rand( 1000000, 9999999 );
        $amount = $request->input('amount');
        $currency = 'USD';
        $payment_method = 'card';
        $bill_to_forename = $request->input('bill_to_forename');
        $bill_to_surname = $request->input('bill_to_surname');
        $bill_to_email = $request->input('bill_to_email');
        $bill_to_phone = $request->input('bill_to_phone');
        $bill_to_address_line1 = $request->input('bill_to_address_line1');
        $bill_to_address_city = $request->input('bill_to_address_city');
        $bill_to_address_state = $request->input('bill_to_address_state');
        $bill_to_address_country = $request->input('bill_to_address_country');
        $bill_to_address_postal_code = $request->input('bill_to_address_postal_code');
        
        $transaction_uuid = mt_rand( 1000000, 9999999 );
        $signed_field_names = 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code';
        $unsigned_field_names = 'card_type,card_number,card_expiry_date';
        $signed_date_time = date('Y-m-d\TH:i:s\Z');
        $locale = 'en';
        $submit = 'Submit';
        
        $card_type = '001';
        $card_number = '4242424242424242';
        $card_expiry_date = '11-2020';

        $signature = array(
            'access_key'=>$access_key,
            'profile_id'=>$profile_id ,
            'transaction_uuid'=>$transaction_uuid ,
            'signed_field_names'=>$signed_field_names ,
            'unsigned_field_names'=>$unsigned_field_names,
            'signed_date_time'=>$signed_date_time,
            'locale'=>$locale,
            'transaction_type'=>$transaction_type,
            'reference_number'=>$reference_number,
            'amount'=>$amount ,
            'currency'=>$currency ,
            'payment_method'=>$payment_method,
            'bill_to_forename'=>$bill_to_forename ,
            'bill_to_surname'=>$bill_to_surname ,
            'bill_to_email'=>$bill_to_email ,
            'bill_to_phone'=>$bill_to_phone ,
            'bill_to_address_line1'=>$bill_to_address_line1,
            'bill_to_address_city'=>$bill_to_address_city,
            'bill_to_address_state'=>$bill_to_address_state,
            'bill_to_address_country'=>$bill_to_address_country,
            'bill_to_address_postal_code'=>$bill_to_address_postal_code,
            'submit'=>$submit
        );


        return response()->json([
            'access_key'=>$access_key,
            'profile_id'=>$profile_id ,
            'transaction_uuid'=>$transaction_uuid ,
            'signed_field_names'=>$signed_field_names ,
            'unsigned_field_names'=>$unsigned_field_names,
            'signed_date_time'=>$signed_date_time,
            'locale'=>$locale,
            'transaction_type'=>$transaction_type,
            'reference_number'=>$reference_number,
            'amount'=>$amount ,
            'currency'=>$currency ,
            'payment_method'=>$payment_method,
            'bill_to_forename'=>$bill_to_forename ,
            'bill_to_surname'=>$bill_to_surname ,
            'bill_to_email'=>$bill_to_email ,
            'bill_to_phone'=>$bill_to_phone ,
            'bill_to_address_line1'=>$bill_to_address_line1,
            'bill_to_address_city'=>$bill_to_address_city,
            'bill_to_address_state'=>$bill_to_address_state,
            'bill_to_address_country'=>$bill_to_address_country,
            'bill_to_address_postal_code'=>$bill_to_address_postal_code,
            'submit' => 'Submit',
            'signature' => $this->sign($signature),
                // 'card_type'=>$card_type,
                // 'card_number'=>$card_number,
                // 'card_expiry_date'=>$card_expiry_date
        ]);


        //tc_ni_001287523
        //VnQNroLhF+XvSNsjDYs9EFKM8+G+e6nd9yougtT85s58aj6UKr+5fjT484H7V+dL+ZEFDoMyimyzKHJiC4+/+6+SLMoS8f1sXefyxP8vH2GCR2fAIvSNGqJky9An7RBpLsQgcu2DzkoJJpiwowz+t90HLcpX+GnkAzeYb1v9mDxASgB6dnO4HKp80umeznwQ8f3t4/oTpmNSzVjjSqC+MGaj7ovTQCSMN/Ot7O2KjOZxrzrW/UOvm8SMwHtFUDV2ok//fCJHFfvhuBcxlbaA/cOkamBUeTTOQBwRkYMBVQNx9wO8T3h4+pjU2c61LM/QJGSGFA8pAuHrn9Dmn/lPxg==
        //
    
        $client = new Client();

        // $response = $client->post('https://ics2wsa.ic3.com/commerce/1.x/transactionProcessor', [
        //     'headers' => ['Content-Type' => 'text/xml;charset=utf-8'],
        //     'form_params' => [
        //         'merchandID'=>'Foster City Flowers' ,
        //         'merchantReferenceCode'=>'482046C3A7E94F5BD1' ,
        //         'firstName'=>$bill_to_forename ,
        //         'lastName'=>$bill_to_surname ,
        //         'street1'=>$bill_to_address_line1,
        //         'city'=>$bill_to_address_city,
        //         'state'=>$bill_to_address_state,
        //         'postalCode'=>$bill_to_address_postal_code,
        //         'country'=>$bill_to_address_country,
        //         'phoneNumber'=>$bill_to_phone ,
        //         'email'=>$bill_to_email ,
        //         'item id'=>'1',
        //         'unitPrice'=>'1',
        //         'quantity'=>'1',
        //         'currency'=>$currency ,
        //         'accountNumber'=>$card_number,
        //         'expirationMonth'=>'12',
        //         'expirationYear'=>'2015',
        //         'card_type'=>$card_type,
        //         'ccAuthService'=>'true',
        //    ],
        // ]);

        $response = $client->post('https://testsecureacceptance.cybersource.com/silent/pay', [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'access_key'=>$access_key,
                'profile_id'=>$profile_id ,
                'transaction_uuid'=>$transaction_uuid ,
                'signed_field_names'=>$signed_field_names ,
                'unsigned_field_names'=>$unsigned_field_names,
                'signed_date_time'=>$signed_date_time,
                'locale'=>$locale,
                'transaction_type'=>$transaction_type,
                'reference_number'=>$reference_number,
                'amount'=>$amount ,
                'currency'=>$currency ,
                'payment_method'=>$payment_method,
                'bill_to_forename'=>$bill_to_forename ,
                'bill_to_surname'=>$bill_to_surname ,
                'bill_to_email'=>$bill_to_email ,
                'bill_to_phone'=>$bill_to_phone ,
                'bill_to_address_line1'=>$bill_to_address_line1,
                'bill_to_address_city'=>$bill_to_address_city,
                'bill_to_address_state'=>$bill_to_address_state,
                'bill_to_address_country'=>$bill_to_address_country,
                'bill_to_address_postal_code'=>$bill_to_address_postal_code,
                'submit' => 'Submit',
                'signature' => '9DAwEViNPDcfjictj/Xmn1NsTWoWTunbBn3D8mZ2ids=',//$this->sign($signature),
                'card_type'=>$card_type,
                'card_number'=>$card_number,
                'card_expiry_date'=>$card_expiry_date
            ]
        ]);

        return response()->json([
            'respuesta'=>$response->getBody()
        ]);
        return json_decode($response->getBody())->success;
    }

    public function pagarws(Request $request){
       
        /*//url del webservice
        $wsdl="https://servicios.bcn.gob.ni/Tc_Servicio/ServicioTC.asmx?wsdl";

        //instanciando un nuevo objeto cliente para consumir el webservice
        $client=new NuSoapClient($wsdl,'wsdl');

        //pasando los parámetros a un array
        $param=array('Ano'=>2019,'Mes'=>2,'Dia'=>1);

        //llamando al método y pasándole el array con los parámetros
        $resultado = $client->call('RecuperaTC_Dia', $param);*/
        try {
        
        ini_set('memory_limit', -1);

        $referenceCode = 'your_merchant_reference_code';

        $client = new CybsSoapClient();  
        $request = $client->createRequest($referenceCode);

// Build a sale request (combining an auth and capture). In this example only
// the amount is provided for the purchase total.
$ccAuthService = new \stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new \stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

$billTo = new \stdClass();
$billTo->firstName = 'John';
$billTo->lastName = 'Doe';
$billTo->street1 = '1295 Charleston Road';
$billTo->city = 'Mountain View';
$billTo->state = 'CA';
$billTo->postalCode = '94043';
$billTo->country = 'US';
$billTo->email = 'null@cybersource.com';
$billTo->ipAddress = '10.7.111.111';
$request->billTo = $billTo;

$card = new \stdClass();
$card->accountNumber = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear = '2020';
$request->card = $card;

$purchaseTotals = new \stdClass();
$purchaseTotals->currency = 'USD';
$purchaseTotals->grandTotalAmount = '90.01';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

       /*
        $request->attributes->merchantID = env('SOAP_MERCHANTID');

        $wsdl="https://ics2wstesta.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.155.wsdl";

        //instanciando un nuevo objeto cliente para consumir el webservice
        $client=new CybsSoapClient($wsdl,'wsdl');
        // $request->headers = "<SOAP-ENV:Header xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"><wsse:Security SOAP-ENV:mustUnderstand=\"1\"><wsse:UsernameToken><wsse:Username>".env('SOAP_MERCHANTID')."</wsse:Username><wsse:Password Type=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText\">".env('SOAP_KEY')."</wsse:Password></wsse:UsernameToken></wsse:Security></SOAP-ENV:Header>";
        
        $ccAuthService = new \stdClass();
        $ccAuthService->run = "true";
        $request->attributes->ccAuthService = $ccAuthService;
    
        $billTo = new \stdClass();
        $billTo->firstName = "John";
        $billTo->lastName = "Doe";
        $billTo->street1 = "1295 Charleston Road";
        $billTo->city = "Mountain View";
        $billTo->state = "CA";
        $billTo->postalCode = "94043";
        $billTo->country = "US";
        $billTo->email = "null@cybersource.com";
        $billTo->ipAddress = "10.7.111.111";
        $request->attributes->billTo = $billTo;
    
        $card = new \stdClass();
        $card->accountNumber = "4111111111111111";
        $card->expirationMonth = "12";
        $card->expirationYear = "2020";
        $card->cardType = "001";
        $request->attributes->card = $card;
    
        $purchaseTotals = new \stdClass();
        $purchaseTotals->currency = "USD";
        $request->attributes->purchaseTotals = $purchaseTotals;
    
        $item0 = new \stdClass();
        $item0->unitPrice = "12.34";
        $item0->quantity = "2";
        $item0->id = "0";	
    
        // $item1 = new \stdClass();
        // $item1->unitPrice = "56.78";
        // $item1->id = "1";
    
        $request->attributes->item = $item0;

        // $client->item = array($item0, $item1);
    
        // $reply = $soapClient->runTransaction($request);
        
        // This section will show all the reply fields.
        // var_dump($reply);

        //llamando al método y pasándole el array con los parámetros
        $resultado = $client->call('runTransaction', $request);*/
        // $resultado = $request;
           

    } catch (Exception $e) {
        return report($e);
    }
    
        return response()->json(["resultado"=>$reply]);
    }
}

/*
// Load the configuration settings
$config = cybs_load_config( 'cybs.ini' );
// set up the request by creating an array and adding fields to it
$request = array();
// We want to do credit card authorization in this example
$request['ccAuthService_run'] = "true";
// Add required fields
$request['merchantID'] = 'infodev';
$request['merchantReferenceCode'] = 'MRC-14344';
$request['billTo_firstName'] = 'Jane';
$request['billTo_lastName'] = 'Smith';
$request['billTo_street1'] = '1295 Charleston Road';
$request['billTo_city'] = 'Mountain View';
$request['billTo_state'] = 'CA';
$request['billTo_postalCode'] = '94043';
$request['billTo_country'] = 'US';
$request['billTo_email'] = 'jsmith@example.com';
$request['card_accountNumber'] = '4111111111111111';
$request['card_expirationMonth'] = '12';
$request['card_expirationYear'] = '2010';
$request['purchaseTotals_currency'] = 'USD';
// This example has two items
$request['item_0_unitPrice'] = '12.34';
$request['item_1_unitPrice'] = '56.78';
// Add optional fields here according to your business needs
// Send request
$reply = array();
$status = cybs_run_transaction( $config, $request, $reply );
// Handle the reply. See "Handling the Return Status," page 369.
*/