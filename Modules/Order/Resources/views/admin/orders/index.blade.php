@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('order::orders.orders'))

    <li class="active">{{ trans('order::orders.orders') }}</li>
@endcomponent

@section('content')
    <div class="box box-primary">
        <div class="box-body index-table" id="orders-table">
            <div style="border: 1px solid silver; border-radius:5px; padding:20px 10px;margin-bottom:10px">
                    <label for="">Status Filter</label>
                    <select class="form-control" name="" id="status_dropdown" style="width:20%">
                        <option value="" selected>Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Dispatch">Dispatch</option>
                        <option value="Completed">Completed</option>
                    </select>
            </div>
            @component('admin::components.table')
                @slot('thead')
                    <tr>
                        <th>{{ trans('admin::admin.table.id') }}</th>
                        <th>{{ trans('order::orders.table.customer_name') }}</th>
                        <th>{{ trans('order::orders.table.customer_email') }}</th>
                        <th>{{ trans('order::orders.customer_phone') }}</th>
                        <th>{{ trans('admin::admin.table.status') }}</th>
                        <th>{{ trans('order::orders.table.platform') }}</th>
                        <th>{{ trans('order::orders.table.total') }}</th>
                        <th data-sort>{{ trans('admin::admin.table.created') }}</th>
                    </tr>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        DataTable.setRoutes('#orders-table .table', {
            index: '{{ "admin.orders.index" }}',
            show: '{{ "admin.orders.show" }}',
        });

        new DataTable('#orders-table .table', {
            columns: [
                { data: 'id', width: '5%' },
                { data: 'customer_name', orderable: false, searchable: false },
                { data: 'customer_email' },
                { data: 'customer_phone' },
                { data: 'status' },
                { data: 'platform' },
                { data: 'total' },
                { data: 'created', name: 'created_at' },
            ],
        });

        $("#status_dropdown").on("change",function(){
            var status = $(this).val();
            $("input[type='search']").val(status);
            $("input[type='search']").trigger('keyup');
        });
    </script>
@endpush
