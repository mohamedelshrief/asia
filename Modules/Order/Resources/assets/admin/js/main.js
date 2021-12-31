$('#order-status').change((e) => {
    if($("#shipping_status").val() ==0 && e.currentTarget.value=="dispatch"){
        $('#bookingModal').modal('show');
        return "";
    }else if($("#shipping_status").val() =="1"){
        if(e.currentTarget.value=="on_hold" || e.currentTarget.value=="pending" || e.currentTarget.value=="pending_payment"  ||  e.currentTarget.value=="processing" ){
            success("Order already dispatched")
            return "";
        }else{
            orderChange(e);
        }
    }else{
        orderChange(e);
    }
});
function orderChange(e){
    if(e.currentTarget.value=="dispatch"){
        $('#bookingModal').modal('show');
    }
    $.ajax({
        type: 'PUT',
        url: route('admin.orders.status.update', e.currentTarget.dataset.id),
        data: { status: e.currentTarget.value },
        success: (message) => {
            success(message);
        },
        error: (xhr) => {
            error(xhr.responseJSON.message);
        },
    });
}
