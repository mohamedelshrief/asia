@extends('admin::layout')

@component('admin::components.page.header')
<style>
    .previous-price{
        color: red;
        text-decoration: line-through
    }
</style>
    @slot('title', trans('product::products.products'))

    <li class="active">{{ trans('product::products.products') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'products')
    @slot('name', trans('product::products.product'))
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form  method="get">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.search_by_model')}}</label>
                    <input type="text" value="{{$request->model_no}}" class="form-control" name="model_no" id="model_no"/>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.search_by_price')}}</label>
                    <input type="number"   value="{{$request->price}}"  class="form-control" name="price" id="price"/>
                </div>
                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.price_sort')}}</label>
                    <select class="form-control select-2" value="{{$request->price_sort}}" name="price_sort" value="price_sort">
                        <option value="any" @if($request->price_sort=='any') selected @endif>Any</option>
                        <option value="ASC" @if($request->price_sort=='ASC') selected @endif>Low To High</option>
                        <option value="DESC" @if($request->price_sort=='DESC') selected @endif>High To Low</option>
                    </select>
                </div>


                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.search_by_product_name')}}</label>
                    <input type="text" value="{{$request->get('query')}}"  class="form-control" name="search_query" id="search_query"/>
                </div>


                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.search_by_brand')}}</label>
                    <select class="form-control select-2" value="{{$request->brand}}" name="brand" value="brand">
                        <option value="any" @if($request->brand=='any') selected @endif>Any</option>
                        @foreach ($Brands as $item)
                            @if ($request->brand==$item->id)
                                <option value="{{$item->id}}" selected >{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="col-md-2 col-lg-2">
                    <label>By Category</label>
                    <select class="form-control select-2" value="{{$request->category}}" name="category" value="category">
                        <option value="any" @if($request->category=='any') selected @endif>Any</option>
                        @foreach ($Categories as $item)
                            @if ($request->category==$item->id)
                                <option value="{{$item->id}}" selected >{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.stock_status')}}</label>
                    <select class="form-control select-2" name="in_stock">
                        <option value="any" @if($request->in_stock=='any') selected @endif>Any</option>
                        <option value="1" @if($request->in_stock==1) selected @endif >In Stock</option>
                        <option value="0" @if($request->in_stock=="0") selected @endif >Out Stock</option>
                    </select>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label>{{trans('product::products.search.image_status')}}</label>
                    <select class="form-control select-2" name="imageStatus">
                        <option value="any" @if($request->imageStatus=='any') selected @endif>Any</option>
                        <option value="1" @if($request->imageStatus==1) selected @endif >Yes</option>
                        <option value="0" @if($request->imageStatus=="0") selected @endif >No</option>
                    </select>
                </div>

                <div class="col-md-3" style="padding-top:20px">
                    <input type="submit" class="btn btn-success btn-block" value="Search"/>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form method="get" action="{{route('admin.products.alldelete')}}">

    @csrf
    <input type="submit" class="btn btn-danger" value="Delete" style="float: right" />
    <table class="table dataTable" >
        <thead>
            <tr>
                <th>
                    <div class="checkbox">
                        <input type="checkbox"  class="select-row" id="checkAll">
                        <label for="checkAll"></label>
                    </div>
                </th>
                <th>SKu</th>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Products as $item)

            <tr>
                <td>
                    <div class="checkbox">
                        <input type="checkbox" name="product_id[]"  class="select-row" value="{{$item->ProductId}}" id="checkbox_{{$item->ProductId}}">
                        <label for="checkbox_{{$item->ProductId}}"></label>
                    </div>
                </td>
                <td>{{$item->sku}}</td>
                <td>
                    <div class="thumbnail-holder">
                        <img src="{{$item->base_image->path}}"  alt="thumbnail">
                    </div>
                </td>
                <td><a href="{{url('')}}/admin/products/{{$item->ProductId}}/edit">{{$item->name}}</a></td>
                <td>
                    @php
                    print($item->formatted_price);
                    @endphp
                </td>
                <td>
                    @if ($item->is_active==true)
                        <span class="dot green"></span>
                    @else
                        <span class="dot red"></span>
                    @endif
                    {{$item->status}}
                </td>
                <td>{{$item->created_at}}</td>
                <td><a href="{{url('')}}/admin/products/{{$item->ProductId}}/delete">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($paginate!=600)
        {{$Products->links()}}
    @endif
    </form>
@endcomponent

@push('scripts')
    @if ($paginate==600)
        <script>
            $(document).ready( function () {
                $('.dataTable').DataTable({
                    "ordering": false
                });
            } );
        </script>
    @endif
    <script>
        $(document).ready(function(){
            $("#checkAll").click(function(){
                $('.select-row').not(this).prop('checked', this.checked);
            });
        })
        /*new DataTable('#products-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%',searchable: true },
                { data: 'sku', width: '5%',searchable: true },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'price', searchable: false },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });*/
    </script>
@endpush
