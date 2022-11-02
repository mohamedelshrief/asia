<?php

namespace Modules\Product\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Product\Entities\Product;

class ProductTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['price'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('price', function ($product) {
                if(!empty($product->special_price)){
                    return "<span class='m-r-5'>{$product->special_price}</span>
                            <del class='text-red'>{$product->price}</del>";
                }
                return "<span class='m-r-5'>{$product->price}</span>";
            })
            ->editColumn('thumbnail', function ($product) {
                return "<img src=".'https://apmpllcbucket.s3.us-east-2.amazonaws.com/'.$product->thumbnail." style='width:100%;'>";
                // return view('admin::partials.table.image', [
                //     'file' => $product->thumbnail,
                // ]);
            });

            // ->editColumn('thumbnail', function ($product) {
            //     return view('admin::partials.table.image', [
            //         'file' => $product->base_image,
            //     ]);
            // })
            // ->editColumn('price', function (Product $product) {
            //     return product_price_formatted($product, function ($price, $specialPrice) use ($product) {
            //         if ($product->hasSpecialPrice()) {
            //             return "<span class='m-r-5'>{$specialPrice}</span>
            //                 <del class='text-red'>{$price}</del>";
            //         }

            //         return "<span class='m-r-5'>{$price}</span>";
            //     });
            // });
    }
}
