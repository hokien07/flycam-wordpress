(function ($) {

    $( document ).on( 'click', '.pro-cart', function(e) {
        e.preventDefault();

        var product_id = $(".product_id").val();
        var product_qty = $(".quantity").val();
        var $thisbutton = $(this);

        $url = "http://flycam.mid.test/?add-to-cart=" + product_id + "&quantity=" +product_qty;

        console.log($url);
        window.location.replace($url);

        return false;
    });


    $(".product-remove").click(function(e) {
        e.preventDefault();
        var key = $(this).attr("key");
        var adminUrl = $(this).attr("admin-url");
        $.ajax({
                type : "post",
                dataType : "json",
                url : adminUrl,
                data : {
                    action: "remove_cart_item",
                    cart_item_key: key
                },
                context: this,
                beforeSend: function(){

                },
                success: function(response) {
                    if(response.success) {
                        console.log(response.data);
                    }else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });

        return false;

    });
})(jQuery);
