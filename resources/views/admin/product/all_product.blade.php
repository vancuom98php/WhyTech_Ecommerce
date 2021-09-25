@extends('admin_layout')

@section('admin_title', 'Admin - Product')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê sản phẩm
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
                            <th scope="col" width="200px">Tên sản phẩm</th>
                            <th scope="col" width="140px">Giá (VNĐ)</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Thư viện</th>
                            <th scope="col">Số lượng tồn</th>
                            <th scope="col">Đã bán</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thương hiệu</th>
                            <th scope="col" width="110px">Ngày thêm</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td><span class="text-ellipsis">{{ number_format($product->product_price) }}</span>
                                </td>
                                <td><img class="product_image_50_50" src="{{ $product->product_image_path }}"
                                        alt="{{ $product->product_image_name }}"></td>
                                <td>
                                    <span class="text-ellipsis product-gallery">
                                        <a href="{{ route('gallery.index', ['id' => $product->product_id]) }}"><i
                                                class="fas fa-images"></i></a>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">{{ $product->product_quantity }}</span></td>
                                <td><span class="text-ellipsis">{{ $product->product_sold }}</span></td>
                                <td><span class="text-ellipsis">{{ optional($product->category)->category_name }}</span>
                                </td>
                                <td><span class="text-ellipsis">{{ optional($product->brand)->brand_name }}</span></td>
                                <td><span class="text-ellipsis">{{ $product->updated_at->format('d-m-Y') }}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($product->product_status == 0)
                                            <a href="{{ route('product.inactive', ['id' => $product->product_id]) }}"><i
                                                    class="fa-category fa fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{ route('product.active', ['id' => $product->product_id]) }}"><i
                                                    class="fa-category fa fa-eye"></i></a>
                                        @endif
                                    </span></td>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $product->product_id]) }}"
                                        class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('product.delete', ['id' => $product->product_id]) }}"
                                        class="active category-action confirm_delete_product" ui-toggle-class="">
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
