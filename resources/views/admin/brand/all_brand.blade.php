@extends('admin_layout')

@section('admin_title', 'Admin - Brand')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê thương hiệu sản phẩm
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
                            <th scope="col" width="250px">Tên thương hiệu</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" width="200px">Số lượng sản phẩm</th>
                            <th scope="col" width="150px">Ngày thêm</th>
                            <th scope="col" width="150px">Hiển thị</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $brand->brand_name }}</td>
                                <td><span class="text-ellipsis">{{ $brand->brand_desc }}</span></td>
                                <td><span class="text-ellipsis">{{ $brand->products->count() }}</span></td>
                                <td><span class="text-ellipsis">{{ $brand->updated_at->format('d-m-Y') }}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($brand->brand_status == 0)
                                            <a href="{{ route('brand.inactive', ['id' => $brand->brand_id]) }}"><i
                                                    class="fa-category fa fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{ route('brand.active', ['id' => $brand->brand_id]) }}"><i
                                                    class="fa-category fa fa-eye"></i></a>
                                        @endif
                                    </span></td>
                                <td>
                                    <a href="{{ route('brand.edit', ['id' => $brand->brand_id]) }}"
                                        class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('brand.delete', ['id' => $brand->brand_id]) }}"
                                        class="active category-action confirm_delete_brand" ui-toggle-class="">
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
