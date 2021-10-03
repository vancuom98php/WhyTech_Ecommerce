@extends('admin_layout')

@section('admin_title', 'Admin - Dashboard')

@section('admin_content')
    <!-- //market-->
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-3 market-update-right">
                    <i class="fa fa-users"></i>
                </div>
                <div class="col-md-9 market-update-left">
                    <h4>Khách hàng</h4>
                    <h4>{{ $customers->count() }}</h4>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-3 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-9 market-update-left">
                    <h4>Doanh thu</h4>
                    <h4>{{ number_format($statisticals->sum('sales')) }} VNĐ</h4>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-3 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-9 market-update-left">
                    <h4>Lợi nhuận</h4>
                    <h4>{{ number_format($statisticals->sum('profit')) }} VNĐ</h4>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-3 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-9 market-update-left">
                    <h4>Đơn hàng</h4>
                    <h4>{{ $orders->count() }}</h4>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //market-->
    <div class="row">
        <div class="panel-body">
            <div class="col-md-12 w3ls-graph">
                <div class="agileinfo-grap">
                    <div class="agileits-box">
                        <header class="agileits-box-header clearfix">
                            <h3>THỐNG KÊ DOANH SỐ ĐƠN HÀNG</h3>
                            <div class="toolbar">
                            </div>
                        </header>
                        <div class="agileits-box-body clearfix">
                            <form autocomplete="off">
                                @csrf
                                <div class="col-md-2">
                                    <p class="datepicker_wrapper"><span class="datepicker">Từ ngày: </span><input
                                            type="text" id="date_from" class="form-control"></p>
                                    <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm"
                                        value="Lọc kết quả">
                                </div>
                                <div class="col-md-2">
                                    <p><span class="datepicker">Đến ngày: </span><input type="text" id="date_to"
                                            class="form-control">
                                    </p>
                                </div>
                            </form>
                            <div class="col-md-12">
                                <div id="chart" style="height: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row agileits-w3layouts-stats">
        <div class="panel-body">
            <div class="col-md-4 stats-info stats-last widget-shadow">
                <div class="stats-last-agile">
                    <div class="stats-title">
                        <h4 class="title">Thống kế sản phẩm, đơn hàng</h4>
                    </div>
                    <div id="donut" class="morris-donut-inverse"></div>
                </div>
            </div>
            <div class="col-md-8 stats-info stats-last widget-shadow">
                <div class="stats-last-agile">
                    <div class="stats-title">
                        <h4 class="title">Top sản phẩm được quan tâm nhiều nhất</h4>
                    </div>
                    <table class="table stats-table ">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>SẢN PHẨM</th>
                                <th>HÌNH ẢNH</th>
                                <th>LƯỢT XEM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topProductViews as $key => $topProductView)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $topProductView->product_name }}</td>
                                    <td><img width="50" height="50" src="{{ asset($topProductView->product_image_path) }}"
                                            alt=""></td>
                                    <td>
                                        <h5>{{ $topProductView->product_views }}</h5>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('backend/js/dashboard.js') }}"></script>
    <script>
        $(function() {
            $("#date_from").datepicker({
                dateFormat: "yy-mm-dd",
            });
        });
        $(function() {
            $("#date_to").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <script type="text/javascript">
        // Number of products, articles, orders,...
        $(document).ready(function() {
            var donut = Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    '#f14850',
                    '#61a1ce',
                    '#f5b942'

                ],

                data: [{
                        label: "Sản phẩm",
                        value: <?= $products->count() ?>
                    },
                    {
                        label: "Đơn hàng",
                        value: <?= $orders->count() ?>
                    },
                    {
                        label: "Khách hàng",
                        value: <?= $customers->count() ?>
                    }
                ]
            });
        });
    </script>
@endsection
