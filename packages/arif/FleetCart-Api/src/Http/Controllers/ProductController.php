<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductTranslation;
use Modules\Product\Events\ProductViewed;
use Modules\Product\Http\Controllers\ProductSearch;
use Modules\Product\Http\Middleware\SetProductSortOption;
use Modules\Review\Entities\Review;
use Auth;
use Modules\Translation\Entities\Translation;
use Modules\Brand\Entities\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Modules\Product\Filters\ProductFilter;
use GuzzleHttp\Client;
use Modules\Setting\Entities\Setting;
class ProductController extends Controller
{
    use ProductSearch;
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    private $groupColumns = [
        'products.id',
        'slug',
        'price',
        'selling_price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'in_stock',
        'manage_stock',
        'qty',
        'new_from',
        'new_to',
    ];
    public function __construct()
    {
        $this->middleware(SetProductSortOption::class)->only('index','HomepageProduct');
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
        return $this->searchProductsForApi($model, $productFilter);
    }

    public function showPrice($id)
    {
        $product = Product::queryWithoutEagerRelations()
            ->select('id')
            ->withPrice()
            ->findOrFail($id);

        $variantPrice = $this->cartItem($product, request('options', []))
            ->total()
            ->convertToCurrentCurrency()
            ->format();

        return [
            'price'=>$variantPrice,
        ];

        return product_price_formatted($product, function ($price) use ($product, $variantPrice) {
            if (! $product->hasSpecialPrice()) {
                return $variantPrice;
            }

            return "{$variantPrice} <span class='previous-price'>{$price}</span>";
        });
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

        $newProducts = Product::latest()->take(10)->get();
        $relevanceProducts =Product::all()->random(10);
        $specialProducts =Product::all();
        $Most= Product::all()->random(10);

        $specialOffers=[];
        foreach ($specialProducts as $key => $product) {
            if($product->special_price!=null){
                $specialOffers[]=$product;
            }
        }
        $json[]=[
            "title"=>trans('product::attributes.special_offers'),
            "products"=>$specialOffers,
            "url"=>"/products?category=specials-offers"
        ];
        $json[]=[
            "title"=>trans('product::attributes.new_arrival'),
            "products"=>$newProducts,
            "url"=>"/products?sort=latest"
        ];
        $json[]=[
            "title"=>trans('product::attributes.most_purchased'),
            "products"=> $Most,
            "url"=>"/products?sort=topRated"
        ];
        $json[]=[
            "title"=>trans('product::attributes.relevance'),
            "products"=>$relevanceProducts,
            "url"=>"/products?sort=relevance"
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
        $brands=Brand::orderBy("sort_id","ASC")->paginate(20);
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
