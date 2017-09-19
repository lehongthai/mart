$(document).ready(function (){
    $(".update_cart").click(function () {
        var id = $(this).attr('id');
        var qty = $(this).parent().parent().find(".qty").val();
        var _token = $("input[name='_token']").val();
        var urlCur = $("#urlCur").val();
        $.ajax({
            url: 'http://localhost/laravel/mart/public/update-cart/' + id,
            type: 'GET',
            cache: false,
            data: {"_token": _token, "qty": qty, "urlCur": urlCur},
            success: function(respone){
                if(respone){
                    window.location = respone;
                }
            }
        });
    });


    $(".buy_cart").click(function () {
        var id = $(this).attr('id');
        var _token = $("input[name='_token']").val();
        var qty = $('input.qtyti').val();
        $.ajax({
            url: 'http://localhost/laravel/mart/public/buy/' + id,
            type: 'POST',
            cache: false,
            data: {"_token": _token, "id": id, 'qty': qty},
            success: function(respone){
                if(respone){
                    $('li#cart_qty').html('');
                    $('li#cart_qty').html(respone);
                }
            }
        });
    });
});