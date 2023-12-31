@extends('public.layout')

@section('title', trans('storefront::checkout.checkout'))

@section('content')
    <checkout-create
        customer-email="{{ auth()->user()->email ?? null }}"
        customer-phone="{{ auth()->user()->phone ?? null }}"
        :addresses="{{ $addresses }}"
        :default-address="{{ $defaultAddress }}"
        :gateways="{{ $gateways }}"
        :countries="{{ json_encode($countries) }}"
        inline-template
    >
        <section class="checkout-wrap">
            <div class="container">
                @include('public.cart.index.steps')

                <form @submit.prevent="placeOrder" @input="errors.clear($event.target.name)">
                    <div class="checkout">
                        <div class="checkout-inner">
                            <div class="checkout-left">
                                <div class="checkout-form">
                                    @include('public.checkout.create.form.account_details')
                                    @include('public.checkout.create.form.billing_details')
                                    @include('public.checkout.create.form.shipping_details')
                                    @include('public.checkout.create.form.order_note')
                                </div>
                            </div>

                            <div class="checkout-right">
                                @include('public.checkout.create.payment')
                                @include('public.checkout.create.coupon')
                            </div>
                        </div>

                        @include('public.checkout.create.order_summary')
                    </div>
                </form>
            </div>
        </section>
    </checkout-create>
@endsection

@push('pre-scripts')
    @if (setting('paypal_enabled'))
        <script src="https://www.paypal.com/sdk/js?client-id={{ setting('paypal_client_id') }}&currency={{ setting('default_currency') }}&disable-funding=credit,card,venmo,sepa,bancontact,eps,giropay,ideal,mybank,p24,p24"></script>
    @endif

    @if (setting('stripe_enabled'))
        <script src="https://js.stripe.com/v3/"></script>
    @endif

    @if (setting('paytm_enabled'))
        @if (setting('paytm_test_mode'))
            <script src="https://securegw-stage.paytm.in/merchantpgpui/checkoutjs/merchants/{{ setting('paytm_merchant_id') }}.js"></script>
        @else
            <script src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/{{ setting('paytm_merchant_id') }}.js"></script>
        @endif
    @endif

    @if (setting('razorpay_enabled'))
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endif
@endpush


@push('scripts')

<script>
   $(document).ready(function(){
        shippingPricing();

        $('input[id="cod"]').parent().css({"display":"none"})

        $(".shipping-methods input[type=radio]").change(function(){
            shippingPricing();
        })

        $(".select-address input[type=radio]").change(function(){
            shippingPricing();
            if($(this).siblings().find('.city_name').text() == "Al-Ain" || $(this).siblings().find('.city_name').text() == "العين"){
                $('input[id="cod"]').parent().css({"display":"block"})
            }
            else{
                $('input[id="cod"]').parent().css({"display":"none"})
                if($('input[id="cod"]').is(":checked")){
                    $('input[id="cod"]').parent().prev().find("input").prop("checked", true);
                }
            }
            
        })

        $('#billing-city').on('change',function(){
            if($("#billing-city :selected").text() == "Al-Ain" || $("#billing-city :selected").text() == "العين"){
                console.log('here');
                $('input[id="cod"]').parent().css({"display":"block"})
            }
            else{
                console.log('not-here');
                $('input[id="cod"]').parent().css({"display":"none"})
                if($('input[id="cod"]').is(":checked")){
                    $('input[id="cod"]').parent().prev().find("input").prop("checked", true);
                }
            }
        });
        // $('input[type="text"]').on('change',function(event){
        //     if($(this).attr('name') == "billing[city]"){
        //         city_id=$(this).parent().parent().parent().find('#billing-city-id').val();
        //         sub_total=$("#subTotalPricing").val();
        //         var shipping_amount=$("#shippingCost").val();
        //         $(".shipping-methods .form-group .price-amount").html("AED "+shipping_amount);
        //         $("#shipping_cost_amount").val(shipping_amount);
        //         $.ajax({
        //             url: "{{url('en/api/shipping-price')}}?city_id="+city_id,
        //             type: "GET",
        //             async: false,
        //             success: function (reponse) {
        //                 // if(shipping_amount == 0){
        //                     shipping_amount=reponse.RateCalculation.RateList[0].TotalPriceAED;
        //                     // $(".shipping-methods .form-group .form-radio:nth-child(2) .price-amount").html("AED "+shipping_amount);
        //                     $(".shipping-methods .form-group .price-amount").html("AED "+shipping_amount);
        //                     $("#shipping_cost_amount").val(shipping_amount);
        //                     total_amount=parseFloat(shipping_amount) + parseFloat(sub_total);
        //                 //    alert(shipping_amount+' fsdfsd=> '+sub_total);
        //                     $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
        //                 // }
        //             },
        //         });
        //     }
        // });
    })
    function shippingPricing(){
        // console.log("here");
        // if(!$("#emirates_post").is(":checked")){
        //     return;
        // }
        address_id=$(".select-address input[type=radio]:checked").val();
        sub_total=$("#subTotalPricing").val();
        var shipping_amount=$("#shippingCost").val();
        // $(".shipping-methods .form-group .price-amount").html("AED "+shipping_amount);
        $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+shipping_amount);
        $("#shipping_cost_amount").val(shipping_amount);
        $.ajax({
            url: "{{url('en/api/shipping-price-web')}}?address_id="+address_id,
            type: "GET",
            async: false,
            success: function (reponse) {
                shipping_amount=reponse.RateCalculation.RateList[0].TotalPriceAED;
                if($('#billing-city').val() != "" && $('#billing-city').val() != null){
                    console.log("if");
                    // $(".shipping-methods .form-group .price-amount").html("AED "+shipping_amount);
                    $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+shipping_amount);
                    if($("#emirates_post").is(":checked")){
                        $("#shipping_cost_amount").val(shipping_amount);
                        total_amount=parseFloat(shipping_amount) + parseFloat(sub_total);
                        $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                        setTimeout(() => {
                            $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                        }, 500);
                    }
                }
                else if($('.select-address .form-radio')){
                    console.log("else-if");
                    var addressess = $('.select-address .form-radio input[type="radio"]');
                    for (let index = 0; index < addressess.length; index++) {
                        if($(addressess[index]).is(":checked")){
                            console.log("else-if-for-if");
                            // $(".shipping-methods .form-group .price-amount").html("AED "+shipping_amount);
                            $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+shipping_amount);
                            if($("#emirates_post").is(":checked")){
                                $("#shipping_cost_amount").val(shipping_amount);
                                total_amount=parseFloat(shipping_amount) + parseFloat(sub_total);
                                $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                                setTimeout(() => {
                                    $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                                }, 500);
                                break;
                            }
                        }
                        else{
                            console.log("else-if-for-else");
                            // $(".shipping-methods .form-group .price-amount").html("AED "+0);
                            $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+0);
                            if($("#emirates_post").is(":checked")){
                                $("#shipping_cost_amount").val(0);
                                total_amount=parseFloat(0) + parseFloat(sub_total);
                                $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                                setTimeout(() => {
                                    $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                                }, 500);
                            }
                        }
                    }
                    console.log("addressess"+addressess.length);
                    if(addressess.length == 0){
                        console.log("else-if-if");
                        // $(".shipping-methods .form-group .price-amount").html("AED "+0);
                        $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+0);
                        if($("#emirates_post").is(":checked")){
                            $("#shipping_cost_amount").val(0);
                            total_amount=parseFloat(0) + parseFloat(sub_total);
                            $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                            setTimeout(() => {
                                $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                            }, 500);
                        }
                    }
                }
                else{
                    console.log("else");
                    // $(".shipping-methods .form-group .price-amount").html("AED "+0);
                    $(".shipping-methods .form-group label[for='emirates_post']").next().html("AED "+0);
                    if($("#emirates_post").is(":checked")){
                        $("#shipping_cost_amount").val(0);
                        total_amount=parseFloat(0) + parseFloat(sub_total);
                        $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                        setTimeout(() => {
                            $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
                        }, 500);
                    }
                }
            },
        });
    }
    $('.btn-add-new-address').on('click',function(event){
        $(this).parent().find('#billing-country').val('AE');
        console.log('done');
        // event.target.parentNode.children[1].children[0].children[5].value = "AE"
        // console.log(event.target.parentNode.children[1].children[0].children[5].value = "AE");
    });
</script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

var CSRF_TOKEN =window.FleetCart.csrfToken;
$(document).ready(function(){
//   $( "#shipping-city" ).autocomplete({
//     source: function( request, response ) {
//       // Fetch data
//       country=$("#shipping-country").val();
//       $.ajax({
//         url:"{{url('/en/api/search-city')}}/"+country+"/"+request.term,
//         type: 'GET',
//         dataType: "json",
//         success: function( data ) {
//             response( data );
//         }
//       });
//     },
//     select: function (event, ui) {
//        $('#shipping-city').val(ui.item.label ? ui.item.label : "");
//        $('#shipping-city-id').val(ui.item.value ? ui.item.value : "");
//        if($('#shipping-city-id').val()!=""){
//             shippingPricingByCity($('#shipping-city-id').val());
//        }
//        return false;
//     }
//   });
    //SHIPPING
    $( "#shipping-city" ).on("change",function(){
        $('#shipping-city-id').val($(this).val());
        if($('#shipping-city-id').val()!=""){
            shippingPricingByCity($('#shipping-city-id').val());
        }
    });

    //BILLING
    $( "#billing-city" ).on("change",function(){
        $('#billing-city-id').val($(this).val());
        if($('#billing-city-id').val()!=""){
            shippingPricingByCity($('#billing-city-id').val());
        }
    });

//   $( "#billing-city" ).autocomplete({
//     source: function( request, response ) {
//       // Fetch data
//       country=$("#billing-country").val();
//       $.ajax({
//         url:"{{url('/en/api/search-city')}}/"+country+"/"+request.term,
//         type: 'GET',
//         dataType: "json",
//         success: function( data ) {
//             response( data );
//         }
//       });
//     },
//     select: function (event, ui) {
//        $('#billing-city').val(ui.item.label ? ui.item.label : "");
//        $('#billing-city-id').val(ui.item.value ? ui.item.value : "");
//        if($('#billing-city-id').val()!=""){
//             shippingPricingByCity($('#billing-city-id').val());
//        }
//        return false;
//     }
//   });

});

function shippingPricingByCity(id){
        shippingPricing();
        // sub_total=$("#subTotalPricing").val();
        // $.ajax({
        //     url: "{{url('en/api/shipping-price')}}?city_id="+id,
        //     type: "GET",
        //     async: false,
        //     success: function (reponse) {
        //         shipping_amount=reponse[0].TotalPriceAED;
        //         $(".shipping-methods .price-amount").html("AED "+shipping_amount);
        //         $("#shipping_cost_amount").val(shipping_amount);
        //         total_amount=parseFloat(shipping_amount)+parseFloat(sub_total);
        //         $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
        //     },
        // });
    }
</script>
@endpush

