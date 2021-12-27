<?php

namespace FleetCartApi\Http\Controllers;

use \Modules\Checkout\Services\OrderService;
use Exception;
use Illuminate\Routing\Controller;
use Modules\Payment\Facades\Gateway;
use Modules\User\Services\CustomerService;
use FleetCart\DBStorage;
use Illuminate\Http\Request;
use Modules\Cart\Facades\Cart;
use Modules\Order\Http\Requests\StoreOrderRequest;
use Modules\Cart\Http\Middleware\CheckCouponUsageLimit;
use Modules\Cart\Http\Middleware\RedirectIfCartIsEmpty;
use Modules\Cart\Http\Middleware\CheckCartStock;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            // 'api',
            'auth:api',
            RedirectIfCartIsEmpty::class,
            CheckCartStock::class,
            CheckCouponUsageLimit::class,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Order\Http\Requests\StoreOrderRequest $request
     * @param \Modules\User\Services\CustomerService $customerService
     * @param \Modules\Checkout\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $globalRequest, StoreOrderRequest $request, CustomerService $customerService, OrderService $orderService)
    {
        if (auth('api')->guest() && $request->create_an_account) {
            $customerService->register($request)->login();
        }

        $order = $orderService->create($request);

        $gateway = Gateway::get($request->payment_method);

        try {
            $response = $gateway->purchase($order, $request);
        } catch (Exception $e) {
            $orderService->delete($order);

            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }

        Cart::clear();

        return response()->json($response);
    }

    public function getCart($id){
        $cart=new DBStorage;
        $response=$cart->get($id);

        return response()->json($response);
    }
}
