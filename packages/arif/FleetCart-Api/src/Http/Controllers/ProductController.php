<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductViewed;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;
use Modules\Product\Http\Middleware\SetProductSortOption;
use Modules\Review\Entities\Review;
use Auth;
class ProductController extends Controller
{
    use ProductSearch;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(SetProductSortOption::class)->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Product $model
     * @param ProductFilter $productFilter
     * @return Response|JsonResponse
     *
     */
    public function index(Product $model, ProductFilter $productFilter)
    {
        request()->merge(['perPage' => request('per_page', config('fleetcart_api.per_page', 10))]);
        return $this->searchProducts($model, $productFilter);
    }

    /**
     * Show the specified resource.
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function show($slug) : JsonResponse
    {
        $product = Product::findBySlug($slug);
        $relatedProducts = $product->relatedProducts()->forCard()->get();
        $upSellProducts = $product->upSellProducts()->forCard()->get();
        $review = $this->getReviewData($product);
        if(Auth::check()){
            if(auth()->user()->wishlistHas($product->id)){
                $product["wishlist_fill"]=true;
            }else{
                $product["wishlist_fill"]=false;
            }
        }else{
            $product["wishlist_fill"]=false;
        }
        event(new ProductViewed($product));

        return response()->json(compact('product', 'relatedProducts', 'upSellProducts', 'review'));
    }

    private function getReviewData(Product $product)
    {
        if (! setting('reviews_enabled')) {
            return;
        }

        return Review::countAndAvgRating($product);
    }
    public function HomepageProduct(){
        $newProducts = Product::orderBy("id","DESC")->limit(20)->get();
        $json[]=[
            "title"=>"New Arrival",
            "products"=>$newProducts,
            "url"=>"/new-arrival"
        ];
        $json[]=[
            "title"=>"Recommended",
            "products"=>$newProducts,
            "url"=>"/recommeded-products"
        ];
        $json[]=[
            "title"=>"Most Purchased",
            "products"=>$newProducts,
            "url"=>"/most-recommeded-products"
        ];
        return response()->json($json);
    }

    public function newArrivalProducts(){
        $newProducts = Product::orderBy("id","DESC")->paginate(20);
        return response()->json($newProducts);
    }
    public function recommededProducts(){
        $newProducts = Product::orderBy("id","DESC")->paginate(20);
        return response()->json($newProducts);
    }
    public function mostPurchaseProducts(){
        $newProducts = Product::orderBy("id","DESC")->paginate(20);
        return response()->json($newProducts);
    }
}
