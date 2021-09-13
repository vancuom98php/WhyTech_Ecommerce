// Add Galleries
$(document).ready(function () {
    loadGallery();

    function loadGallery() {
        let productId = $('.product_id').val();
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/gallery/show';

        $.ajax({
            url: urlToRedirect,
            method: 'POST',
            data: {
                productId: productId,
                _token: _token,
            },
            success: function (response) {
                $('#gallery_load').html(response);
            },
        });
    }

    $('#gallery_images').change(function () {
        let error = '';
        let gallery_images = $('#gallery_images')[0].files;

        if (gallery_images.length > 5)
            error += 'Bạn chỉ được tải 5 ảnh cùng 1 lúc.';
        else if (gallery_images.length == '')
            error += 'Vui lòng chọn ảnh trước khi tải.';
        else if (gallery_images.size > 2000000)
            error += 'Kích thước không được lớn hơn 2MB.';

        if (error == '') {

        } else {
            $('#gallery_images').val('');
            $('#error_gallery').html('<strong>' + error + '</strong>');
            return false;
        }
    });

    $(document).on('blur', '.edit_gallery_name', function () {
        let gallery_id = $(this).data('gallery_id');
        let gallery_name = $(this).text();
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/gallery/update-name';

        $.ajax({
            url: urlToRedirect,
            method: 'POST',
            data: {
                gallery_id: gallery_id,
                gallery_name: gallery_name,
                _token: _token,
            },
            success: function (response) {
                loadGallery();
                alertify.success('Cập nhật tên ảnh thành công');
            },
        });
    });

    $(document).on('click', '.delete_gallery', function () {
        let gallery_id = $(this).data('gallery_id');
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/gallery/delete';

        Swal.fire({
            title: 'Are you sure?',
            text: "Bạn có chắc muốn xóa hình ảnh này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28A745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: urlToRedirect,
                    data: {
                        gallery_id: gallery_id,
                        _token: _token,
                    },
                    success: function () {
                        loadGallery();
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

    $(document).on('change', '.gallery_image', function () {
        var gallery_id = $(this).data('gallery_id');
        var gallery_image = document.getElementById('image-' + gallery_id).files[0];
        var urlToRedirect = '/gallery/update';

        var form_data = new FormData();

        form_data.append("gallery_image", gallery_image);
        form_data.append("gallery_id", gallery_id);

        $.ajax({
            url: urlToRedirect,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                loadGallery();
                alertify.success('Cập nhật tên ảnh thành công');
            },
        });
    });
})