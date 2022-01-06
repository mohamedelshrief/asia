@extends('public.layout')

@section('title', trans('storefront::account.view_order.track_order'))


@section('content')
    <section class="order-details-wrap">
        <div class="container">

            <h3 class="section-title">{{ trans('storefront::account.view_order.track_order') }}</h3>
            <h5>{{ trans('storefront::account.orders.order_id') }}: {{$order->id}}</h5>
            <br/>
            <div class="history-tl-container">
                <ul class="tl">
                  <li class="tl-item" ng-repeat="item in retailer_history">
                    <div class="timestamp">
                      3rd March 2015 <br/>7:00 PM
                    </div>
                    <div class="item-title">Start from Shire</div>
                    <div class="item-detail">Don't forget the ring</div>
                  </li>

                </ul>
            </div>

        </div>
    </section>
@endsection


@push('scripts')
<script>
    $(document).ready(function(){
            $.ajax({
                url: "{{route('account.orders.gettracking',1000003699324)}}",
                type: "GET",
                async: false,
                success: function (reponse) {
                }
            });
    });
</script>
@endpush
