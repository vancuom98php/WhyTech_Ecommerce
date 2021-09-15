@extends('admin_layout')

@section('admin_title', 'Admin - FeeShip')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Quản lý phí vận chuyển
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
                <table class="table table-striped b-t b-light" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th scope="col">Tỉnh/Thành phố</th>
                            <th scope="col">Quận/Huyện</th>
                            <th scope="col">Xã/Phường</th>
                            <th scope="col">Phí vận chuyển</th>
                            <th scope="col" width="100px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feeships as $feeship)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td><span class="text-ellipsis">{{ optional($feeship->province)->province_name }}</span></td>
                                <td><span class="text-ellipsis">{{ optional($feeship->district)->district_name }}</span></td>
                                <td><span class="text-ellipsis">{{ optional($feeship->ward)->ward_name }}</span></td>
                                <td><span class="text-ellipsis">{{ number_format($feeship->fee_feeship) }} VNĐ</span></td>
                                <td>
                                    <a href="{{ route('delivery.edit', ['id' => $feeship->fee_id]) }}"
                                        class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    &nbsp; &nbsp;
                                    <a href="{{ route('delivery.delete', ['id' => $feeship->fee_id]) }}"
                                        class="active category-action confirm_delete_feeship" ui-toggle-class="">
                                        <i class="fas fa-trash-alt text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('backend/js/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/list.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
@endsection
