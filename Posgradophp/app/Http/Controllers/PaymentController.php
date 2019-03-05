<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use GuzzleHttp\Client;

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
        $transaction_uuid = mt_rand( 1000000, 9999999 );
        $signed_field_names = 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code';
        $unsigned_field_names = 'card_type,card_number,card_expiry_date';
        $signed_date_time = '2019-02-27T20:11:17Z';//date('Y-m-d H:i:s');
        $locale = 'en';
        $transaction_type = 'authorization';
        $reference_number = '1551298322957';
        $amount = '100.00';
        $currency = 'USD';
        $payment_method = 'card';
        $bill_to_forename = 'daniel';
        $bill_to_surname = 'daniel';
        $bill_to_email = 'null@cybersource.com';
        $bill_to_phone = '02890888888';
        $bill_to_address_line1 = '1 Card Lane';
        $bill_to_address_city = 'My City';
        $bill_to_address_state = 'CA';
        $bill_to_address_country = 'US';
        $bill_to_address_postal_code = '94043';
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
            'signature' => $signature,
            'card_type'=>$card_type,
            'card_number'=>$card_number,
            'card_expiry_date'=>$card_expiry_date
        ]);
    
        $client = new Client();

        $response = $client->post('https://testsecureacceptance.cybersource.com/silent/pay', [
            'headers' => ['Content-Type' => 'text/html;charset=utf-8'],
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
                'signature' => $this->sign($signature),
                'card_type'=>$card_type,
                'card_number'=>$card_number,
                'card_expiry_date'=>$card_expiry_date
            ],
        ]);

        return response()->json([
            'respuesta'=>$response->getBody()
        ]);
        return json_decode($response->getBody())->success;
    }
}
