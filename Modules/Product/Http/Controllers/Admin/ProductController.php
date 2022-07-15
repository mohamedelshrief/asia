<?php

namespace Modules\Product\Http\Controllers\Admin;

use Modules\Product\Entities\Product;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Http\Requests\SaveProductRequest;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;

class ProductController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'product::products.product';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'product::admin.products';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveProductRequest::class;

    public $paginate=20;
    public function index(Request $request){
        /*if ($request->has('query')) {
            return $this->getModel()
                ->search($request->get('query'))
                ->query()
                ->limit($request->get('limit', 10))
                ->get();
        }*/

        if ($request->has('table')) {
            return $this->getModel()->table($request);
        }

        $Brands=Brand::get();
        $Categories=Category::get();
        $this->paginate=20;
        $orderByColumnName="products.id";
        $orderByColumnValue="DESC";
        if (isset($request->price_sort) && $request->price_sort!="any") {
            if($request->price_sort=="ASC"){
                $orderByColumnName="products.price";
                $orderByColumnValue="ASC";
            }else{
                $orderByColumnName="products.price";
                $orderByColumnValue="DESC";
            }
        }
        if (isset($request->category) && $request->category!="any") {

            //With Category
            $Products=Product::join("product_translations","product_translations.product_id","=","products.id")->join("product_categories","product_categories.product_id","=","products.id")->where(function($q) use ($request) {
                if (isset($request->search_query) &&  $request->search_query!="" &&  $request->search_query!=null) {
                    $q->where("product_translations.name","LIKE",'%'.$request->get('search_query').'%');
                    $this->paginate=600;
                }
                if (isset($request->model_no)) {
                    $q->where("products.sku",$request->get('model_no'));
                    $this->paginate=600;
                }
                if (isset($request->price)) {
                    $q->where("products.price",$request->get('price'));
                    $this->paginate=600;
                }
    
                if (isset($request->brand) && $request->brand!="any") {
                    $q->where("products.brand_id",$request->brand);
                    $this->paginate=600;
                }
                if (isset($request->in_stock) && $request->in_stock!="any") {
                    $q->where("products.in_stock",$request->in_stock);
                    $this->paginate=600;
                }
                if (isset($request->category) && $request->category!="any") {
                    $this->paginate=600;
                }
            })->where("product_categories.category_id",$request->category)->where("product_translations.locale",locale())->select("products.*","products.id as ProductId")->orderBy($orderByColumnName,$orderByColumnValue)->paginate($this->paginate);
        }else{

            //WithOut Category
            $Products=Product::join("product_translations","product_translations.product_id","=","products.id")->where(function($q) use ($request) {
                if (isset($request->search_query) &&  $request->search_query!="" &&  $request->search_query!=null) {
                    $q->where("product_translations.name","LIKE",'%'.$request->get('search_query').'%');
                    $this->paginate=600;
                }
                if (isset($request->model_no)) {
                    $q->where("products.sku",$request->get('model_no'));
                    $this->paginate=600;
                }
                if (isset($request->price)) {
                    $q->where("products.price",$request->get('price'));
                    $this->paginate=600;
                }
    
                if (isset($request->brand) && $request->brand!="any") {
                    $q->where("products.brand_id",$request->brand);
                    $this->paginate=600;
                }
                if (isset($request->in_stock) && $request->in_stock!="any") {
                    $q->where("products.in_stock",$request->in_stock);
                    $this->paginate=600;
                }
            })->where("product_translations.locale",locale())->select("products.*","products.id as ProductId")->orderBy($orderByColumnName,$orderByColumnValue)->paginate($this->paginate);
        }
       
        $paginate=$this->paginate;
        return view("product::admin.products.index",compact('Brands','Categories','Products','request','paginate'));
    }
    public function destroy(Request $request){
        Product::where("id",$request->id)->delete();
        return redirect()->route('admin.products.index');
    }
    public function allDelete(Request $request){
        foreach ($request->product_id as $key => $value) {
            Product::where("id",$value)->delete();
        }
        return redirect()->back()->with("message","All Selected Products Deleted");
    }
}
