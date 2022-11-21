$('#noPolisi').change(function(){
    $.ajax({
        url : 'formCheckout/'+$(this).value(),
        type : 'get',
        data :{},
        success : function (data) {
            if (data.success==true) {
                $('#noPolisi').value = data.noPolisi;
                $('#jenisKendaraan').value = data.jenisKendaraan;
            } else {
                alert('Cannot Find No Polisi')
            }
        },
        error: function(jqHRX, textStatus, errorThrown){}
    });
});