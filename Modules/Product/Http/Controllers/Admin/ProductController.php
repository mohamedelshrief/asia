<?php

namespace Modules\Product\Http\Controllers\Admin;

use Modules\Product\Entities\Product;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Http\Requests\SaveProductRequest;
use Modules\Brand\Entities\Brand;
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
        $Products=Product::join("product_translations","product_translations.product_id","=","products.id")->where(function($q) use ($request) {
            if (isset($request->query) &&  $request->query!="") {
                $q->where("product_translations.name","LIKE",'%'.$request->get('query').'%');
            }
            if (isset($request->model_no)) {
                $q->where("products.sku",$request->get('model_no'));
            }
            if (isset($request->price)) {
                $q->where("products.price",$request->get('price'));
            }

            if (isset($request->brand) && $request->brand!="any") {
                $q->where("products.brand_id",$request->brand);
            }
            if (isset($request->in_stock) && $request->in_stock!="any") {
                $q->where("products.in_stock",$request->in_stock);
            }
        })->where("product_translations.locale",locale())->select("products.*","products.id as ProductId")->paginate(20);

        return view("product::admin.products.index",compact('Brands','Products','request'));
    }
    public function destroy(Request $request){
        Product::where("id",$request->id)->delete();
        return redirect()->route('admin.products.index');
    }
}
