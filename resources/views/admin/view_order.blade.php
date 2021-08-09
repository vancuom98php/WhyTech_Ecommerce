@extends('admin_layout')

@section('admin_title', 'Admin - Order')

@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading dashboard-heading">
            Thông tin khách hàng
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Hình thức thanh toán</th>
                        <th scope="col">Số tiền còn nợ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{ optional($order->customer)->customer_name }}</td>
                        <td><span class="text-ellipsis">{{ optional($order->customer)->customer_email }}</span></td>
                        <td><span class="text-ellipsis">{{ optional($order->customer)->customer_phone }}</span></td>
                        <td><span class="text-ellipsis">{{ optional($order->payment)->payment_method }}</span></td>
                        <td><span class="text-ellipsis">{{ $order->order_total }} VNĐ</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading dashboard-heading">
            Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th scope="col">Tên người nhận hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ giao hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{ optional($order->shipping)->shipping_name }}</td>
                        <td><span class="text-ellipsis">{{ optional($order->shipping)->shipping_email }}</span></td>
                        <td><span class="text-ellipsis">{{ optional($order->shipping)->shipping_address }}</span></td>
                        <td><span class="text-ellipsis">{{ optional($order->shipping)->shipping_phone }}</span></td>
                        <td><span class="text-ellipsis">{{ optional($order->shipping)->shipping_notes }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading dashboard-heading">
            Chi tiết đơn hàng
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->order_details as $order_details)
                    <tr>
                        <td>
                            <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                        </td>
                        <td>{{ optional($order_details->product)->product_name }}</td>
                        <td><img class="product_image_50_50" src="{{ optional($order_details->product)->product_image_path }}"
                            alt="{{ optional($order_details->product)->product_image_name }}"></td>
                        <td><span class="text-ellipsis">{{ number_format(optional($order_details->product)->product_price) }} VNĐ</span></td>
                        <td><span class="text-ellipsis">{{ $order_details->product_sales_quantity }}</span></td>
                        <td><span class="text-ellipsis">{{ number_format($order_details->product_sales_quantity * optional($order_details->product)->product_price) }} VNĐ</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
