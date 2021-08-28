$(document).ready(function () {
    $(".choose").on("change", (function () {
        let action = $(this).attr('id');
        let id = $(this).val();
        let _token = $('input[name="_token"]').val();
        let result = '';
        let urlToRedirect = '/delivery/select';

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
        })
    }))
})