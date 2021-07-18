@extends('admin_layout')
@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê danh mục sản phẩm
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
                            <th scope="col" width="250px">Tên danh mục</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" width="200px">Ngày thêm</th>
                            <th scope="col" width="150px">Hiển thị</th>
                            <th scope="col" style="width:50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $category->category_name }}</td>
                                <td><span class="text-ellipsis">{{ $category->category_desc }}</span></td>

                                <td><span class="text-ellipsis">{{ $category->updated_at->format('d-m-Y') }}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($category->category_status == 0)
                                            <a
                                                href="{{ route('category-product.inactive', ['id' => $category->category_id]) }}"><i
                                                    class="fa-category fa fa-eye-slash"></i></a>
                                        @else
                                            <a
                                                href="{{ route('category-product.active', ['id' => $category->category_id]) }}"><i
                                                    class="fa-category fa fa-eye"></i></a>
                                        @endif
                                    </span></td>
                                <td>
                                    <a href="{{ route('category-product.edit', ['id' => $category->category_id]) }}" class="active category-action" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                                    </a>
                                    <a href="{{ route('category-product.delete', ['id' => $category->category_id]) }}" class="active category-action confirm_delete_category" ui-toggle-class="">
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
