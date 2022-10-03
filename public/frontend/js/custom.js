
$(document).ready(function () {
    loadcart();
    loadwishlist();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   

    function loadcart(){
        $.ajax({
            method: 'GET',
            url: "/load-cart-data",
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                
            }
        });
    }
    function loadwishlist(){
        $.ajax({
            method: 'GET',
            url: "/load-wish-data",
            success: function (response) {
                $('.wish-count').html('');
                $('.wish-count').html(response.count);
                
            }
        });
    }



    $(document).on('click','.addtocartbtn', function (e)
    // $('.addtocartbtn').click(function (e)
     {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response) {
                loadcart();
                swal(response.status)

            }
        });

    });


    $('.addtowishlist').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-whishlist",
            data: {
                'product_id': product_id,
                
            },
            success: function (response) {
                loadwishlist();
                swal(response.status)

            }
        });

    });



    $(document).on('click','.increment-btn', function (e)
    // $('.increment-btn').click(function (e) 
    {
        e.preventDefault();
        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();


        var value = parseInt(inc_value, 10)
        value = isNaN(value) ? '0' : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });

    $(document).on('click','.decrement-btn', function (e)

    // $('.decrement-btn').click(function (e)
     {
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10)
        value = isNaN(value) ? '0' : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });


    // $('.del-cart-btn').click(function (e)
    $(document).on('click','.del-cart-btn', function (e) 
        
    
     {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },

            success: function (response) {
                 loadcart();

                $('.cartitems').load(location.href + " .cartitems");
                // window.location.reload();
                swal("", response.status, "success");
            }
        });

    });

    // $('.del-whish-btn').click(function (e)
    $(document).on('click','.del-whish-btn', function (e) 

     { 
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-whish-item",
            data: {
                'prod_id': prod_id,
            },

            success: function (response) {
        loadwishlist();

                $('.wishitems').load(location.href + " .wishitems");

                // window.location.reload();
                swal("", response.status, "success");
            }
        });
        
    });

    $(document).on('click','.chngqty', function (e)
    // $('.chngqty').click(function (e) 
    {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': prod_qty
            },
            success: function (response) {
                $('.cartitems').load(location.href + " .cartitems");

                // window.location.reload();

            }

        });




    });
});