<?php

namespace Modules\Order\Http\Controllers\Admin;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderProduct;
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


        //Booking Create Service
        $client = new Client();

        $payload=[
            "BookingRequest"=>[
                "SenderContactName"=> "Mr. John",
                "SenderCompanyName"=> "Sender Company Name",
                "SenderAddress"=> "Some Test Address",
                "SenderCity"=> 1,
                "SenderContactMobile"=> "512354123",
                "SenderContactPhone"=> "1234123",
                "SenderEmail"=> "sendersemail@gmail.com",
                "SenderZipCode"=> "00000",
                "SenderState"=> "Dubai",
                "SenderCountry"=> 971,
                "ReceiverContactName"=> "Mr. Sam",
                "ReceiverCompanyName"=> "Receiver Company Name",
                "ReceiverAddress"=> "Some Test ReceiverAddress",
                "ReceiverCity"=> 2,
                "ReceiverContactMobile"=> "14222212",
                "ReceiverContactPhone"=> "443124",
                "ReceiverEmail"=> "sasdf@asdf.com",
                "ReceiverZipCode"=> "00000",
                "ReceiverState"=> "Abu Dhabi",
                "ReceiverCountry"=> 971,
                "ReferenceNo"=> "Cross-Ref-123456789",
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
                "CommodityDescription"=> "Any good description",
                "Pieces"=> 1,
                "Weight"=> $request->weight,
                "WeightUnit"=> "Grams",
                "Length"=> $request->length,
                "Width"=> $request->width,
                "Height"=> $request->height,
                "DimensionUnit"=> "Centimetre",
                "ItemValue"=> "124",
                "ValueCurrency"=> "AED",
                "ProductCode"=> null,
                "DeliveryInstructionsID"=> null,
                "RequestSource"=> null,
                "SendMailToSender"=> "No",
                "SendMailToReceiver"=> "No",
                "PreferredPickupDate"=> "1-jan-2022",
                "PreferredPickupTimeFrom"=> "15:00",
                "PreferredPickupTimeTo"=> "18:00",
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

        return $json_data->BookingResponse->AWBNumber;

    }
}
