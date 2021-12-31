<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModal" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content modal-lg">
        <div class="shippingLoading hide" id="shippingLoading">
            <center>
                    <img src="https://icon-library.com/images/loading-icon-transparent-background/loading-icon-transparent-background-12.jpg" width="50px"/>
                    <br/>
                    <b>Please wait...</b>
            </center>
        </div>
        <form method="POST" id="bookingFormAction">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}" />

            <div class="modal-header">
            <h3 class="modal-title" id="bookingModalTitle" style="color: #000">Dispatch Packages</h3>

            </div>
            <div class="modal-body">
                @if ($order->shipping_data=="")
                <input type="hidden" class="shipping_status" id="shipping_status" value="0"/>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Parcel Weight & Size</h4>
                        <hr/>
                        <div class="form-group">
                            <label>Parcel Weight <small>(in grams)</small></label>
                            <input type="text" name="weight" class="form-control"/>
                            <span class="text-danger error_msg" id="weight_msg"></span>
                        </div>

                        <div class="form-group">
                            <label>Length <small>(in cm)</small></label>
                            <input type="text" name="length" class="form-control"/>
                            <span class="text-danger error_msg" id="length_msg"></span>
                        </div>

                        <div class="form-group">
                            <label>Width <small>(in cm)</small></label>
                            <input type="text" name="width" class="form-control"/>
                            <span class="text-danger error_msg" id="width_msg"></span>
                        </div>

                        <div class="form-group">
                            <label>Height <small>(in cm)</small></label>
                            <input type="text" name="height" class="form-control"/>
                            <span class="text-danger error_msg" id="height_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                            <img src="{{url('images/parcel.png')}}" width="200px" style="margin-top: 20%"/>
                    </div>
                </div>
                <hr/>
                <h4>Pickup</h4>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Pickup Date</label>
                            <input type="date" name="pickup_date" class="form-control"/>
                            <span class="text-danger error_msg" id="pickup_date_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Pickup Time From</label>
                            <input type="time" name="pickupFrom" class="form-control"/>
                            <span class="text-danger error_msg" id="pickupFrom_msg"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Pickup Time To</label>
                            <input type="time" name="pickupTo" class="form-control"/>
                            <span class="text-danger error_msg" id="pickupTo_msg"></span>
                        </div>
                    </div>
                </div>

                @else
                    <input type="hidden" class="shipping_status" id="shipping_status" value="1"/>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <img src="{{url('images/parcel.png')}}" width="300px" />
                            <br/><br/>
                            <h4>Order Already Dispatched
                                <br/>
                                <b>Tracking Number: {{$order->shipping_data["AWBNumber"]}} </b>
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">

            @if ($order->shipping_data=="")
                <button type="submit" class="btn btn-primary" >Dispatch</button>
            @endif
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  @push('scripts')
    <script>
        $("#bookingFormAction").submit(function(e) {
            $("#shippingLoading").removeClass("hide");
            e.preventDefault();
            $("input,textarea").removeClass("error");
            $(".error_msg").html("");
            var form_data = new FormData(this);
            $.ajax({
                url: "{{route('admin.orders.action.dispatch')}}",
                type: "POST",
                data: form_data,
                async: false,
                success: function (reponse) {
                    if(reponse=="success"){
                        success("Order has been dispatched")
                        setTimeout(() => {
                            $("#shippingLoading").addClass("hide");
                            window.location.reload();
                        }, 3000);
                    }else{
                        console.log(reponse);
                    }
                },error: function (xhr) {
                    $("#shippingLoading").addClass("hide");
                    setTimeout(function(){
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $("#"+key+"_msg").html(value);
                            $("input[name="+key+"],textarea[name="+key+"]").addClass("error");
                        });
                    },1000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
  @endpush
