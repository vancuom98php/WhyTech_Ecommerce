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

// Đơn vị hành chính
$(document).ready(function () {
    $(".choose").on("change", (function () {
        let action = $(this).attr('id');
        let id = $(this).val();
        let _token = $('input[name="_token"]').val();
        let result = '';
        let urlToRedirect = '/checkout/select-delivery';

        if (action == 'province')
            result = 'district';
        else
            result = 'ward';

        $.ajax({
            url: urlToRedirect,
            method: 'POST',
            data: {
                action: action,
                id: id,
                _token: _token
            },
            success: function (data) {
                $('#' + result).html(data);
            }
        });
    }));
});

// Calculate fee shippings
$(document).ready(function () {
    $(".calculate_delivery").on("click", (function () {
        let province_id = $('.province').val();
        let district_id = $('.district').val();
        let ward_id = $('.ward').val();
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/checkout/calculate-delivery';

        if (province_id == '' || district_id == '' || ward_id == '')
            alertify.error('Vui lòng chọn địa chỉ cụ thể để tính phí vận chuyển');
        else {
            $.ajax({
                url: urlToRedirect,
                method: 'POST',
                data: {
                    province_id: province_id,
                    district_id: district_id,
                    ward_id: ward_id,
                    _token: _token
                },
                success: function (response) {
                    $("#list-cart").empty();
                    $("#list-cart").html(response);
                }
            });
        }
    }));
});

// Place Order
$(document).ready(function () {
    $(".place_order").on("click", function (event) {
        let urlToRedirect = '/checkout/place-order';
        let that = $(this);
        let is_login = $("#is_customer_login").val();
        let is_shipping = $("#is_shipping_form").val();
        let _token = $('input[name="_token"]').val();
        let payment_method = ($('input[name=payment_method]:checked', '#checkout-f__payment').val());

        if (!$("#term-and-condition").is(":checked")) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi...',
                text: 'Vui lòng đồng ý với điều khoản dịch vụ!',
            })
        } else {
            if (is_login == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi...',
                    text: 'Vui lòng đăng nhập trước khi thanh toán!',
                    footer: '<a class="gl-link" style="font-size: 16px" href="/checkout/login-checkout">Đến trang đăng nhập?</a>'
                })
            } else if (is_shipping == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi...',
                    text: 'Vui lòng điền thông tin vận chuyển trước khi thanh toán!',
                })
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Bạn có chắc muốn xác nhận đặt hàng?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28A745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: urlToRedirect,
                            type: 'POST',
                            data: {
                                payment_method: payment_method,
                                _token: _token
                            },
                            success: function () {
                                window.setTimeout(function () {
                                    location.reload();
                                }, 3000);
                                Swal.fire(
                                    'Đã xác nhận!',
                                    'Đơn hàng sẽ được phê duyệt và chuyển đến bạn một cách nhanh chóng!',
                                    'success'
                                );
                            },
                            error: function () {
                            }
                        });
                    } else {
                        Swal.fire(
                            'Đã hủy!',
                            'Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng!',
                            'error'
                        )
                    }
                })
            }
        }
    });
});


