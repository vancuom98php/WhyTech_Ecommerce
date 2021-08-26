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
