// Thêm sản phẩm vào mini cart
$('.btn-add-cart').on('click', function (event) {
    let id = $(this).data('id_product');
    let productId = $('.cart_product_id_' + id).val();
    let quantity = $('.cart_product_qty_' + id).val();
    let _token = $('input[name="_token"]').val();
    let urlToRedirect = '/cart/add'

    $.ajax({
        url: urlToRedirect,
        method: 'POST',
        data: {
            productId: productId,
            quantity: quantity,
            _token: _token,
        },
    }).done(function (response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#cart_quantity_show").text($("#total-quantity-cart").val());
    });

});

// Xóa sản phẩm trong mini cart
$("#change-item-cart").on("click", ".card-mini-product .mini-product__delete-link", function () {
    let id = $(this).data("id");
    let urlToRedirect = '/cart/delete/' + id;

    $.ajax({
        url: urlToRedirect,
        method: 'GET',
    }).done(function (response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        if ($("#total-quantity-cart").val())
            $("#cart_quantity_show").text($("#total-quantity-cart").val())
        else $("#cart_quantity_show").text("0");
        alertify.success('Xóa sản phẩm khỏi giỏ hàng thành công');
    });
});

// Xóa sản phẩm trong list cart
$("#list-cart").on("click", ".cart-item .list-cart-delete", function () {
    let id = $(this).data("id");
    let urlToRedirect = '/cart/remove/' + id;

    $.ajax({
        url: urlToRedirect,
        method: 'GET',
    }).done(function (response) {
        $("#list-cart").empty();
        $("#list-cart").html(response);
        alertify.success('Xóa sản phẩm khỏi giỏ hàng thành công');
    });
});

// Xóa toàn bộ giỏ hàng
$("#list-cart").on("click", ".route-box__g2 .destroy-cart", function () {
    let urlToRedirect = '/cart/destroy';
    let _token = $('input[name="_token"]').val();

    $.ajax({
        url: urlToRedirect,
        method: 'POST',
        data: {
            _token: _token
        }
    }).done(function (response) {
        $("#list-cart").empty();
        $("#list-cart").html(response);
        alertify.success('Xóa toàn bộ giỏ hàng thành công');
    });
});

// Cập nhật toàn bộ giỏ hàng
$("#list-cart").on("click", ".route-box__g2 .update-cart", function () {
    var list = [];
    let urlToRedirect = '/cart/update';
    let _token = $('input[name="_token"]').val();

    $("table tbody tr td").each(function () {
        $(this).find(".product_quantity").each(function () {
            var element = { session_id: $(this).data("id"), quantity: $(this).val() };
            list.push(element);
        });
    });

    $.ajax({
        url: urlToRedirect,
        method: 'POST',
        data: {
            "_token": _token,
            "data": list
        }
    }).done(function (response) {
        $("#list-cart").empty();
        $("#list-cart").html(response);
        alertify.success('Cập nhật giỏ hàng thành công');
    });
});