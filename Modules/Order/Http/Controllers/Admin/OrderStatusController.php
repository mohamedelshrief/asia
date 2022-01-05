<?php

namespace Modules\Order\Http\Controllers\Admin;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderProduct;
use Modules\Setting\Entities\Country;
use Modules\Order\Events\OrderStatusChanged;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderStatusController
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Modules\Order\Entities\Order $request
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
        $this->adjustStock($order);

        $order->update(['status' => request('status')]);

        $message = trans('order::messages.status_updated');

        event(new OrderStatusChanged($order));

        return $message;
    }

    private function adjustStock(Order $order)
    {
        if ($this->canceledOrRefunded(request('status'))) {
            $this->restoreStock($order);
        }

        if ($this->canceledOrRefunded($order->status)) {
            $this->reduceStock($order);
        }
    }

    private function canceledOrRefunded($status)
    {
        return in_array($status, [Order::CANCELED, Order::REFUNDED]);
    }

    private function restoreStock(Order $order)
    {
        $order->products->each(function (OrderProduct $orderProduct) {
            if ($orderProduct->product->manage_stock) {
                $orderProduct->product->increment('qty', $orderProduct->qty);
            }

            if ($orderProduct->product->qty === 1) {
                $orderProduct->product->markAsInStock();
            }
        });
    }

    private function reduceStock(Order $order)
    {
        $order->products->each(function (OrderProduct $orderProduct) {
            if (
                $orderProduct->product->manage_stock
                && $orderProduct->product->qty !== 0
            ) {
                $orderProduct->product->decrement('qty', $orderProduct->qty);
            }

            if ($orderProduct->product->qty === 0) {
                $orderProduct->product->markAsOutOfStock();
            }
        });
    }

    public function dispatch(Request $request){
        $request->validate([
            "weight"=>"required|numeric",
            "length"=>"required|numeric",
            "width"=>"required|numeric",
            "height"=>"required|numeric",
            "pickup_date"=>"required",
            "pickupFrom"=>"required",
            "pickupTo"=>"required",
        ],[
            "*.required"=>"This field require*",
            "*.numeric"=>"Only enter numeric value",
        ]);

        //Store Details
        $storeDetail = setting()->all();

        //Order Details
        $order=Order::findOrFail($request->order_id);
        //return $order;


        //Booking Create Service
        $client = new Client();
        $payload=[
            "BookingRequest"=>[
                "SenderContactName"=>$storeDetail["store_name"],
                "SenderCompanyName"=> $storeDetail["store_name"],
                "SenderAddress"=> $storeDetail["store_address_1"]." ".$storeDetail["store_address_2"],
                "SenderCity"=> 1,
                "SenderContactMobile"=> "",
                "SenderContactPhone"=>$storeDetail["store_phone"],
                "SenderEmail"=> $storeDetail["store_phone"],
                "SenderZipCode"=> $storeDetail["store_zip"],
                "SenderState"=> "Dubai",
                "SenderCountry"=> 971,
                "ReceiverContactName"=> $order->shipping_first_name." ".$order->shipping_last_name,
                "ReceiverCompanyName"=> "",
                "ReceiverAddress"=> $order->shipping_address_1." ".$order->shipping_address_2,
                "ReceiverCity"=> 2,
                "ReceiverContactMobile"=> "",
                "ReceiverContactPhone"=> $order->customer_phone,
                "ReceiverEmail"=> $order->customer_phone,
                "ReceiverZipCode"=> $order->shipping_zip,
                "ReceiverState"=> "Abu Dhabi",
                "ReceiverCountry"=> 971,
                "ReferenceNo"=> "Cross-Ref-".$order->id,
                "ReferenceNo1"=> null,
                "ReferenceNo2"=> null,
                "ReferenceNo3"=> null,
                "ContentTypeCode"=> "NonDocument",
                "NatureType"=> 11,
                "Service"=> "Domestic",
                "ShipmentType"=> "Express",
                "DeleiveryType"=> "Door to Door",
                "Registered"=> "No",
                "PaymentType"=> "Credit",
                "CODAmount"=> "0",
                "CODCurrency"=> null,
                "CommodityDescription"=> $order->note,
                "Pieces"=> 1,
                "Weight"=> $request->weight,
                "WeightUnit"=> "Grams",
                "Length"=> $request->length,
                "Width"=> $request->width,
                "Height"=> $request->height,
                "DimensionUnit"=> "Centimetre",
                "ItemValue"=> $order->total->amount,
                "ValueCurrency"=> "AED",
                "ProductCode"=> null,
                "DeliveryInstructionsID"=> null,
                "RequestSource"=> null,
                "SendMailToSender"=> "No",
                "SendMailToReceiver"=> "No",
                "PreferredPickupDate"=> date("d-M-Y", strtotime($request->pickup_date)),
                "PreferredPickupTimeFrom"=> $request->pickupFrom,
                "PreferredPickupTimeTo"=> $request->pickupTo,
                "Is_Return_Service"=> "No",
                "PrintType"=> "LabelOnly",
                "Latitude"=> "40.689263",
                "Longitude"=> "74.044505",
                "TransactionSource"=> null,
                "RequestType"=> "Booking",
                "Remarks"=> null,
                "SpecialNotes"=> null
            ]
        ];

        $response = $client->post('https://osbtest.epg.gov.ae/ebs/genericapi/booking/rest/CreateBooking', [
            'json' => $payload,
            'headers' => [
              'AccountNo'=>'C175120',
              'Password'=>'C175120',
              'Content-Type'=>'application/json'
            ]
          ]);

        $body = $response->getBody();
        $json_data=json_decode($body);



        //If Success Is True. Status Change To Dispatch
        $shipping_data=$json_data->BookingResponse;



        if($json_data->BookingResponse->serviceResult->success){
            Order::where("id",$request->order_id)->update(["shipping_data"=>json_encode($shipping_data),"status"=>"dispatch"]);
            return "success";
        }


        //If Return Error.
        return $shipping_data;
    }

    public function label($id){
        $order=Order::findOrFail($id);
        $bin = base64_decode($order->shipping_data["AWBLabel"], true);

        if (strpos($bin, '%PDF') !== 0) {
          throw new Exception('Missing the PDF file signature');
        }

        # Write the PDF contents to a local file
        file_put_contents('pdfs/order_'.$order->id.'_shipping.pdf', $bin);
        $url ='pdfs/order_'.$order->id.'_shipping.pdf';
        //return $url ;

        if (file_exists($url)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($url) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($url));
            readfile($url);
            exit;
        }

        return "No File Exist";

    }
    public function getCountries(){

        //Booking Create Service
        $client = new Client();

        $response = $client->get('https://osbtest.epg.gov.ae/ebs/genericapi/lookups/rest/GetCountries', [
            'headers' => [
              'AccountNo'=>'C175120',
              'Password'=>'C175120',
              'Content-Type'=>'application/json'
            ]
          ]);

        $body = $response->getBody();
        $json_data=json_decode($body);


        $shipping_data=$json_data->CountriesResponse->Countries->Country;
        foreach ($shipping_data as $key => $value) {
            $country=new Country;
            $country->country_id=$value->CountryId;
            $country->country_code=$value->CountryCode;
            $country->country_name=$value->CountryName;
            $country->save();

            echo $value->CountryName."<br/>";
        }
    }
}
