@extends('admin_layout')

@section('admin_title', 'Admin - Coupon')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê các mã giảm giá
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
                @if (session()->has('notification_update-success'))
                    <div class="alert alert-success" style="font-weight: bold;">
                        {!! session('notification_update-success') !!}
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
                            <th scope="col">Tên mã</th>
                            <th scope="col">Mã giảm giá</th>
                            <th scope="col">Loại mã</th>
                            <th scope="col">Số lượng mã</th>
                            <th scope="col">Giá trị giảm áp dụng cho mã</th>
                            <th scope="col">Ngày tạo mã</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td><span class="text-ellipsis">{{ $coupon->coupon_code }}</span></td>
                                <td> 
                                    <span class="text-ellipsis">
                                        @if($coupon->coupon_condition == 1)
                                            Giảm theo phần trăm
                                        @else
                                            Giảm theo số tiền
                                        @endif
                                    </span>
                                    </td>
                                <td><span class="text-ellipsis">{{ $coupon->coupon_time }}</span></td>
                                <td>
                                    <span class="text-ellipsis">
                                        @if($coupon->coupon_condition == 1)
                                            - {{ $coupon->coupon_number }} %
                                        @else
                                            - {{ number_format($coupon->coupon_number) }} VNĐ
                                        @endif
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">{{ $coupon->updated_at->format('d-m-Y') }}</span></td>
                                <td>
                                    <a href="{{ route('coupon.edit', ['id' => $coupon->coupon_id]) }}" class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('coupon.delete', ['id' => $coupon->coupon_id]) }}" class="active category-action confirm_delete_coupon" ui-toggle-class="">
                                        <i class="fas fa-trash-alt text-danger text"></i>
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
                        {{ $coupons->links() }}
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