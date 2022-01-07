<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductViewed;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;
use Modules\Product\Http\Middleware\SetProductSortOption;
use Modules\Review\Entities\Review;
use Auth;
use Modules\Translation\Entities\Translation;
use Modules\Brand\Entities\Brand;

use Modules\Setting\Entities\Setting;
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
        //return $product->id;
        if(auth("api")->user()){
            if(auth('api')->user()->wishlistHas($product->id)){
                $product["wishlist_fill"]=true;
            }else{
                $product["wishlist_fill"]=false;
            }
        }else{
            $product["wishlist_fill"]=false;
        }
        event(new ProductViewed($product));
        $product->description=html_entity_decode($product->description);
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

    public function newArrivalProducts(Request $request){
        $newProducts = Product::orderBy("id","DESC")->paginate(20);
        return response()->json($newProducts);
    }
    public function recommededProducts(Request $request){
        $newProducts = Product::orderBy("id","DESC")->where("")->paginate(20);
        return response()->json($newProducts);
    }
    public function mostPurchaseProducts(Request $request){
        $newProducts = Product::orderBy("id","DESC")->where("")->paginate(20);
        return response()->json($newProducts);
    }
    public function brands(){
        $brands=Brand::paginate(20);
        return response()->json($brands);
    }
    public function translation(){
        return Setting::allCached()["supported_locales"];
    }
    public function brandsImport(){
        $brands=Brand::all();
        foreach ($brands as $key => $value) {
            $slug=strtolower(str_replace(" ","-",$value->name));
            Brand::where("id",$value->id)->update(["slug"=>$slug]);
        }
        return $brands;
    }
}
