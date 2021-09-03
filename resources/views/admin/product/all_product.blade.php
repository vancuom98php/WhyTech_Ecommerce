@extends('admin_layout')

@section('admin_title', 'Admin - Product')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê sản phẩm
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
                            <th scope="col" width="200px;">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng tồn</th>
                            <th scope="col">Đã bán</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thương hiệu</th>
                            <th scope="col">Ngày thêm</th>
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
                                <td><span class="text-ellipsis">{{ number_format($product->product_price) }} VNĐ</span>
                                </td>
                                <td><img class="product_image_50_50" src="{{ $product->product_image_path }}"
                                        alt="{{ $product->product_image_name }}"></td>
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
                        {{ $products->links() }}
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
