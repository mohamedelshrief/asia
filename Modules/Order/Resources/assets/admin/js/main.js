$('#order-status').change((e) => {
    if(e.currentTarget.value =="dispatch"){
        $('#bookingModal').modal('show');
    }else{
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
});
