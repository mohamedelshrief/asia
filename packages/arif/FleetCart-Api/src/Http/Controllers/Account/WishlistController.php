<?php


namespace FleetCartApi\Http\Controllers\Account;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use FleetCartApi\Entities\User;


class WishlistController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth("api")->user()
            ->wishlist()
            ->with('files')
            ->latest()
            ->paginate(request('per_page', config('fleetcart_api.per_page', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "productId"=>"required"
        ],[
            "productId.required"=>"Product Required"
        ]);
        //return auth('api')->user()->wishlistHas($request->productId);
        if (!auth('api')->user()->wishlistHas($request->productId)) {
            auth('api')->user()->wishlist()->attach($request->productId);
        }

        return response()->json([
            'message' => trans('fleetcart_api::validation.wishlist_added')
        ], Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function toggle(): JsonResponse
    {
        if (auth("api")->user()->wishlistHas(request('productId'))) {
            return $this->destroy(request('productId'));
        }

        return $this->store();
    }

    /**
     * Destroy resources by the given id.
     *
     * @param string $productId
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            "productId"=>"required"
        ],[
            "productId.required"=>"Product Required"
        ]);
        auth("api")->user()->wishlist()->detach($request->productId);

        return response()->json([
            'message' => trans('fleetcart_api::validation.wishlist_deleted')
        ]);
    }
}
