<?php

namespace Modules\Import\Http\Controllers\Admin;

use Maatwebsite\Excel\Excel;
use Modules\Import\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use Modules\Import\Http\Requests\StoreImporterRequest;
use DB;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductTranslation;
use Modules\Meta\Entities\MetaData;
use Modules\Meta\Entities\MetaDataTranslation;
use Modules\Brand\Entities\Brand;
use Modules\Brand\Entities\BrandTranslation;
use Storage;
use Illuminate\Support\Facades\File;

class ImporterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import::admin.importer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Import\Http\Requests\StoreImporterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImporterRequest $request)
    {
        @set_time_limit(0);

        $importers = ['product' => ProductImport::class];

        ExcelFacade::import(new $importers[$request->import_type], $request->file('csv_file'), null, Excel::CSV);

        if (session()->has('importer_errors')) {
            return back()->with('error', trans('import::messages.there_was_an_error_on_rows', [
                'rows' => implode(', ', session()->pull('importer_errors', [])),
            ]));
        }

        return back()->with('success', trans('import::messages.the_importer_has_been_run_successfully'));
    }
    public function importData(){
        /*
        ********************************************
        ------------  Category Import --------------
        ********************************************

        $categories = DB::connection('mysql2')->table('oc_category')->get();
        foreach ($categories as $key => $value) {
            $name=DB::connection('mysql2')->table('oc_category_description')->where("category_id",$value->category_id)->where("language_id",1)->first();
            $category=new Category;
            $category->id= $value->category_id;
            $category->parent_id= $value->parent_id;
            $category->slug= str_replace(" ","-",$name->name);
            $category->is_searchable= 1;
            $category->is_active= 1;
            $category->save();
            $name_categories = DB::connection('mysql2')->table('oc_category_description')->where("category_id",$value->category_id)->get();
            foreach ($name_categories as $key => $item) {
                    $translation=new CategoryTranslation;
                    $translation->category_id= $value->category_id;
                    if($item->language_id==1){
                        $translation->locale="en";
                    }else{
                        $translation->locale="ar_SA";
                    }
                    $translation->name=$item->name;
                    $translation->save();
            }
            echo $item->name;

        }*/

        /*
        ********************************************
        ------------  Brand Import -----------------
        ********************************************/
        $brands=DB::table('oc_manufacturer')->get();
        foreach ($brands as $key => $value) {

            //$brand->id=$value->manufacturer_id;


            $base="https://www.apmpllc.com/image/";

            $url = $base.$value->image;
            $contents = file_get_contents($url);
            $name = substr($url, strrpos($url, '/') + 1);

            $fileUrl='storage/media/'.$name;
            File::put( public_path( $fileUrl), $contents);



            $file_id=DB::table('files')->insertGetId(
                [
                    'user_id' => auth()->user()->id,
                    'filename' =>$name,
                    'disk'=>'public_storage',
                    'path'=>'media/'.$name,
                    'extension'=>'jpg',
                    'size'=>2048,
                    'mime'=>'jpg',
                ]
            );

            DB::table('entity_files')->insertGetId(
                [
                    'file_id' => $file_id,
                    'entity_type' =>'Modules\Brand\Entities\Brand',
                    'zone'=>'logo',
                    'entity_id'=>$value->manufacturer_id,
                ]
            );



            echo $base.$value->image."<br/>";

        }


        /*
        ********************************************
        ------------  Product Import ---------------
        ********************************************
        */

        /*$products = DB::connection('mysql2')->table('oc_product')
        ->join("oc_product_description","oc_product_description.product_id","=","oc_product.product_id")
        ->select("oc_product.*","oc_product_description.*")
        ->limit(10)
        ->get();*/
        //->join("oc_product_to_category","oc_product_to_category.product_id","=","oc_product.product_id")

        //foreach ($products as $key => $item) {
            //$base="https://www.apmpllc.com/image/";
            //echo $base.$item->image;
            //Adding Product
           // $check=Product::where("tmp_id",$item->product_id)->count();
           /* if($check==0){

                    $product=new Product;
                    $product->slug=str_replace(" ","-",$item->name);
                    $product->tmp_id=$item->product_id;
                    $product->brand_id=$item->manufacturer_id;
                    $product->price=$item->price;
                    $product->special_price_type="";
                    $product->special_price_type="fixed";
                    $product->qty=$item->quantity;
                    $product->manage_stock=0;
                    $product->viewed=0;
                    $product->in_stock=1;
                    $product->is_active=1;
                    $product->save();


                    $descriptions= DB::connection('mysql2')->table('oc_product_description')->where("product_id",$item->product_id)->get();


                    $meta=new MetaData;
                    $meta->entity_type="Modules\Product\Entities\Product";
                    $meta->entity_id=$product->id;
                    $meta->save();


                    foreach ($descriptions as $key => $description) {
                        $transation=new ProductTranslation;
                        $transation->product_id=$product->id;
                        if($description->language_id==1){
                            $transation->locale="en";
                        }else{
                            $transation->locale="ar_SA";
                        }
                        $transation->name=$description->name;
                        $transation->description=$description->description;
                        $transation->short_description=$description->meta_description;
                        $transation->save();



                        $metaData=new MetaDataTranslation;
                        $metaData->meta_data_id=$meta->id;

                        if($description->language_id==1){
                            $metaData->locale="en";
                        }else{
                            $metaData->locale="ar_SA";
                        }
                        $metaData->meta_title=$description->meta_title;
                        $metaData->meta_description=$description->meta_description;
                        $metaData->save();
                    }

                    $categories= DB::connection('mysql2')->table('oc_product_to_category')->where("product_id",$item->product_id)->get();

                    foreach ($categories as $key => $category) {
                        DB::table('product_categories')->insert(
                            ['product_id' => $product->id, 'category_id' => $category->category_id]
                        );
                    }

                    echo $item->name."<br/>";

                }*/
       // }

    }
}
