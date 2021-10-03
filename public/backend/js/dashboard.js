// Order sales statistics
$(document).ready(function () {
    chartByMonth();

    // Morris Chart
    var chart = new Morris.Bar({
        element: 'chart',

        //option chart
        lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'period',
        ykeys: ['order', 'sales', 'profit', 'quantity'],
        labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng']
    });

    // Lọc doanh số theo ngày
    $('#btn-dashboard-filter').on('click', function () {
        var dateFrom = $('#date_from').val();
        var dateTo = $('#date_to').val();
        let _token = $('input[name="_token"]').val();

        let urlToRedirect = '/dashboard/filter-by-date';

        $.ajax({
            url: urlToRedirect,
            method: "POST",
            dataType: "JSON",
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo,
                _token: _token
            }, success: function (response) {
                chart.setData(response);
            }
        })
    });

    // Hiện thị doanh số của tháng
    function chartByMonth() {
        let _token = $('input[name="_token"]').val();
        let urlToRedirect = '/dashboard/filter-by-month'

        $.ajax({
            url: urlToRedirect,
            method: "POST",
            dataType: "JSON",
            data: {
                _token: _token
            },

            success: function (data) {
                chart.setData(data);
            }
        });
    }
});