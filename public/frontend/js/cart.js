$(document).ready(function (){
    
    changeLanguage();

    buyProduct();
    updateProduct();

    validatePlugin();
    
});

function changeLanguage(){
    $('.langWeb').on('click', function(){
        var locale = $(this).attr('data-lang');
        var _token = $('input[name=_token]').val();


        $.ajax({

            url: BASE_URL + '/language',
            type: 'POST',
            data: {locales: locale, _token: _token},
            dataType: 'json',
            success: function(data){

            },
            error: function(data){

            },
            beforeSend: function(){

            },
            complete: function(data){
                window.location.reload(true);
            }
        });
    });

        

}

function buyProduct(){
    $(".buy_cart").click(function () {
        var id = $(this).attr('id');
        var _token = $("input[name='_token']").val();
        var qty = $('input.qtyti').val();
        $.ajax({
            url: BASE_URL + '/buy/' + id,
            type: 'POST',
            cache: false,
            data: {"_token": _token, "id": id, 'qty': qty},
            success: function(respone){
                if(respone){
                    $('.showCart').html('');
                    $('.showCart').html(respone);
                }
            }
        });
    });
}

function updateProduct(){
    $(".update_cart").click(function () {
        var id = $(this).attr('id');
        var qty = $(this).parent().parent().parent().find(".cart-plus-minus").val();
        var _token = $("input[name='_token']").val();
        var urlCur = $("#urlCur").val();
        $.ajax({
            url: BASE_URL + '/update-cart/' + id,
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
}

function validatePlugin() {
    if ($("#contactForm").length > 0) {
        $("#contactForm").validate({
            rules: {
                name: "required",
                email:{
                    required: true,
                    email: true
                },
                subject: "required",
                comments: "required"
            }
        });
    }

    if ($("#personalInfo").length > 0) {
        $("#personalInfo").validate({
            rules: {
                name: "required",
                phone:{
                    required: true,
                    matches: "[0-9]+",  // <-- no such method called "matches"!
                    minlength:9,
                    maxlength:12
                },
                email:{
                    required: true,
                    email: true
                },
                address: "required"
            }
        });
    }
}