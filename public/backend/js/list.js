$('.confirm_delete_brand').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa thương hiệu này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa thương hiệu sản phẩm thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_category').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa danh mục này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa danh mục sản phẩm thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_product').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa sản phẩm này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa sản phẩm thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_order').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa đơn hàng này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa đơn hàng thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_coupon').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa mã giảm giá này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa mã giảm giá thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_feeship').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa phí vận chuyển này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa phí vận chuyển thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_slider').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc muốn xóa slider này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28A745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlToRedirect,
                success: function () {
                    that.parent().parent().remove();
                    Swal.fire(
                        'Đã xóa!',
                        'Xóa slider thành công!',
                        'success'
                    )
                },
                error: function () {
                }
            });
        }
    })
});

$('.confirm_delete_user').on('click', function (event) {
    event.preventDefault();
    let urlToRedirect = event.currentTarget.getAttribute('href');
    let that = $(this);
    let id = $(this).attr('id');
    let auth_id = $(this).attr('auth_id');

    if (id == auth_id) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Bạn không thể tự xoá chính mình!',
        });
    } else {
        Swal.fire({
            title: 'Are you sure?',
            text: "Bạn có chắc muốn xóa user này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: urlToRedirect,
                    success: function () {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Xóa user thành công!',
                            'success'
                        )
                    },
                    error: function () {
                    }
                });
            }
        })
    }


});

// Xử lý đơn hàng
$(document).ready(function () {
    $(".order_details").on("change", (function () {
        let order_status = $(this).val();
        let order_id = $(this).children(":selected").attr("id");
        let order_status_before = $("#order_status_before").val();
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/order/handle';

        order_product_id = [];
        $('input[name="order_product_id"]').each(function () {
            order_product_id.push($(this).val());
        })

        j = 0;

        if (order_status == 1) {
            for (i = 0; i < order_product_id.length; i++) {
                let product_sales_quantity = $('.product_sales_quantity_' + order_product_id[i]).val();
                let product_quantity = $('.product_quantity_' + order_product_id[i]).val();

                if (parseInt(product_sales_quantity) > parseInt(product_quantity)) {
                    j++;
                    if (j == 1)
                        alertify.error('Lỗi xử lý đơn hàng. Vài sản phẩm không đủ số lượng');
                    $('.error_quantity_' + order_product_id[i]).css('background-color', '#eddddd');
                }
            }
        }

        if (j == 0) {
            $.ajax({
                url: urlToRedirect,
                method: 'POST',
                data: {
                    order_status: order_status,
                    order_status_before: order_status_before,
                    order_id: order_id,
                    _token: _token
                },
                success: function (response) {
                    if (order_status == 1)
                        alertify.success('Xử lý đơn hàng thành công');
                    else
                        alertify.error('Hủy đơn hàng thành công');
                    location.reload();
                }
            });
        }
    }));
});

// Comment
$('.btn-reply').on('click', function () {
    let commentId = $(this).data('comment_id');
    let commentContent = $('.comment_content_' + commentId).val();
    let urlToRedirect = '/comment/reply';
    let _token = $('input[name="_token"]').val();

    if (commentContent == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Vui lòng nhập nội dung trả lời!',
        });
    } else {
        $.ajax({
            url: urlToRedirect,
            method: 'POST',
            data: {
                commentId: commentId,
                commentContent: commentContent,
                _token: _token
            },
            success: function (response) {
                $('.comment_content_' + commentId).val('');
                location.reload();
            }
        });
    }
});

// Category Order
$(document).ready(function () {
    $('#category_order').sortable({
        placeholder: 'ui-state-highlight',
        update: function (event, ui) {
            let page_id_array = new Array();
            let _token = $('input[name="_token"]').val();
            let urlToRedirect = '/category-product/sort';

            $('#category_order tr').each(function () {
                page_id_array.push($(this).attr("id"));
            });

            $.ajax({
                url: urlToRedirect,
                method: 'POST',
                data: {
                    page_id_array: page_id_array,
                    _token: _token
                }, success: function (response) {
                    alertify.success('Sắp xếp danh mục thành công');
                }
            })
        }
    });
});