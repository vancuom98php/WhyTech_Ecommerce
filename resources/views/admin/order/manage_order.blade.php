@extends('admin_layout')

@section('admin_title', 'Admin - Order')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Quản lý đơn hàng
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
                @if (session()->has('notification'))
                    <div class="alert alert-danger" style="font-weight: bold;">
                        {!! session('notification') !!}
                    </div>
                @endif
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Tổng giá tiền</th>
                            <th scope="col">Tình trạng đơn hàng</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col" width="100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ optional($order->customer)->customer_name }}</td>
                                <td><span class="text-ellipsis">{{ $order->order_total }} VNĐ</span></td>
                                <td><span class="text-ellipsis">
                                    @if($order->order_status == 0)
                                        Chưa được xử lý
                                    @elseif ($order->order_status == 1)
                                        Đã xử lý - Đang giao hàng
                                    @elseif ($order->order_status == 2)
                                        Đã hủy - Tạm giữ
                                    @endif
                                    </span></td>
                                <td><span class="text-ellipsis">{{ $order->created_at }}</span></td>
                                <td>
                                    <a href="{{ route('order.show', ['code' => $order->order_code]) }}"
                                        class="active category-action" style="margin-right: 10px;" ui-toggle-class="">
                                        <i class="fa fa-eye text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('order.delete', ['code' => $order->order_code]) }}"
                                        class="active category-action confirm_delete_order" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        {{ $orders->links() }}
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('backend/js/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/list.js') }}"></script>
    
@endsection
