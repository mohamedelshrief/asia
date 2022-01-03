<?php


namespace FleetCartApi\Http\Controllers\Account;


use FleetCartApi\Http\Controllers\BaseController;
use FleetCartApi\Http\Middleware\Authenticate;
use FleetCartApi\Http\Requests\StoreReviewRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Product\Entities\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $orders = auth('api')->user()
            ->orders()
            ->latest()
            ->with(['products'])
            ->paginate(request('per_page', config('fleetcart_api.per_page', 10)));

        return response()->json($orders);
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function recent() : JsonResponse
    {
        return response()->json(auth()->user()->recentOrders(5));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $order = auth()->user()
            ->orders()
            ->with(['products', 'coupon', 'taxes'])
            ->where('id', $id)
            ->firstOrFail();

        return response()->json($order);
    }

    public function orderStatus(Request $request){
        $client = new Client();

        $response = $client->get('https://osbtest.epg.gov.ae/ebs/epg.pos.trackandtrace.rest/GetTrackDetails?track_id=1000003699324', [
            'headers' => [
              'Authorization'=>'Basic '.base64_encode("osb.user:EPG@12345"),
              'Content-Type'=>'application/json'
            ]
          ]);

        $body = $response->getBody();
        $json_data=json_decode($body);

        return $json_data->track_final_result;
    }

}
