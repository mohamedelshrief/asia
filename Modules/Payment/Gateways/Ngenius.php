<?php

namespace Modules\Payment\Gateways;

use Exception;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Modules\Payment\GatewayInterface;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class Ngenius implements GatewayInterface
{
    public $label;
    public $description;

    public function __construct()
    {
        $this->label = setting('ngenius_label');
        $this->description = setting('ngenius_description');
    }

    public function purchase(Order $order, Request $r)
    {
        $outletRef   = setting('ngenius_outlet_key');
        $apikey      = setting('ngenius_api_key');

        $idServiceURL  = "https://api-gateway.ngenius-payments.com/identity/auth/access-token";           // set the identity service URL (example only)
        $txnServiceURL = "https://api-gateway.ngenius-payments.com/transactions/outlets/".$outletRef."/orders";             // set the transaction service URL (example only)


        /*$tokenHeaders  = array("Authorization: Basic ".$apikey, "Content-Type: application/vnd.ni-identity.v1+json");
        $tokenResponse = $this->invokeCurlRequest("POST", $idServiceURL, $tokenHeaders, http_build_query(array('grant_type' => 'client_credentials')));
        $tokenResponse = json_decode($tokenResponse);*/
        $tokenResponse=$this->generateAuthToken($apikey);
        var_dump( $tokenResponse);
       // exit;
        $access_token = $tokenResponse->access_token;
        $money=$order->total->amount;
        $order=[
            'action'=>"SALE",
            'amount'=>[
                'currencyCode'=>'AED',
                'value'=>(int)$money*100
            ],
            'language'=>"en",
            'merchantOrderReference'=>time(),
            'merchantAttributes'=>[
                'redirectUrl'=>'http://asia.nytrotech.net/en/checkout/'.$order->id."/complete/ngenius"
            ]
        ];
        //$order = new stdClass();

        /*$order->action = "AUTH";                                        // Transaction mode ("AUTH" = authorize only, no automatic settle/capture, "SALE" = authorize + automatic settle/capture)
        $order->amount->currencyCode = "AED";                           // Payment currency ('AED' only for now)
        $order->amount->value = (int)$order->total*100;                                   // Minor units (1000 = 10.00 AED)
        $order->language = "en";                                        // Payment page language ('en' or 'ar' only)
        $order->merchantOrderReference = time();                                        // Payment page language ('en' or 'ar' only)

        $order->merchantAttributes->redirectUrl = "https://google.com";*/
        $order = json_encode($order);


        $orderCreateHeaders  = array("Authorization: Bearer ".$access_token, "Content-Type: application/vnd.ni-payment.v2+json", "Accept: application/vnd.ni-payment.v2+json");
        $orderCreateResponse = $this->invokeCurlRequest("POST", $txnServiceURL, $orderCreateHeaders, $order);

        //return $orderCreateResponse;
        $orderCreateResponse = json_decode($orderCreateResponse);
        $paymentLink           = $orderCreateResponse->_links->payment->href;     // the link to the payment page for redirection (either full-page redirect or iframe)
        $orderReference      = $orderCreateResponse->reference;              // the reference to the order, which you should store in your records for future interaction with this order

        //header("Location: ".$paymentLink);
        return $paymentLink;
    }

    public function complete(Order $order)
    {
    }

    function invokeCurlRequest($type, $url, $headers, $post) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($type == "POST") {

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        }

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        return $server_output;

    }
    public function generateAuthToken($api_token){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-gateway.ngenius-payments.com/identity/auth/access-token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/vnd.ni-identity.v1+json',
            'Authorization: Basic '.$api_token,
            'Cookie: _abck=65F421B23F990E200ED0E638699695D6~-1~YAAQDB0gF5iWVnp+AQAAWGdovgc5ubUHotpXkGAHlD0Lut257yMI1cXXySouaHTClEx2w285+PLnacZwHLnQ5snqaeJ2X6oJWzbwYFbo+3PQxUPzLnTM5d4yqiO8bFobiR/e+cvtK1hIk+5qpyjqiPFBNdLkL3j2TVHxuM6r+g2lnD6CZMzkMNmwnlAc33IjzykMdvw3vCDvfJsImhW7T9FwnTIgn0GgvD79o5oDVGnw9FHPfVUTVNu9mxMHl7EGM+LkFYjSGMdPjQdUrOi7xeCSrnZfhhntZ/n1Ug0Gq48AFqjgwcmHFzfrY/Okj4u3SdttuzVutCiWu1R+rrn+G1+21eCd7Ev7YCmG8v6Wm5nxl/QYdDy7oHyfAfWuih+kLLKq~-1~-1~-1; bm_sz=E9FB6EC6527B747A77A4E5D342C37A8D~YAAQDB0gF5mWVnp+AQAAWGdovg5XNN8GUZq9sLfXzN9iViCZArlj6ruvxbrAP22zl6M9iH1zyu/aLN9V+zW9TacZFu/j3yE+Askz0Wv4OEqfjATBUNukePWwj74t5OBAIu0VH1/xda2HK0+Z1L0ZV+Exrw69dTN5yeRc3NNN/1Yyd/pUEiLINOgmXp6/H5OyQj4lGoNalrxJpdZtAdJuUE2DnARKNqmEGkmmQBSk50AUjXDdYxQD1RpmXQjCMhfpqAhspXtK27EneDP74VnSFCNFnFIoM8BqopWCXcNLD5QsGuv3yKlz975nT1Wh~4601142~3682371'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
