@extends('admin_layout')

@section('admin_title', 'Admin - Category')

@section('admin_content')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading dashboard-heading">
                Liệt kê danh mục sản phẩm
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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Danh mục cha</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lượng sản phẩm</th>
                            <th scope="col" width="110px">Ngày thêm</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col" width="50px"></th>
                        </tr>
                    </thead>
                    <tbody id="category_order">
                        @foreach ($categories as $category)
                            <tr id="{{ $category->category_id }}">
                                <td>
                                    <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td>{{ $category->category_name }}</td>
                                <td><span class="text-ellipsis">
                                        @if ($category->category_parent == 0)
                                            --------
                                        @else
                                            @foreach ($sub_categories as $sub_category)
                                                @if ($sub_category->category_id == $category->category_parent)
                                                    {{ $sub_category->category_name }}
                                                @break
                                            @endif
                                        @endforeach
                        @endif
                        </span>
                        </td>
                        <td><span class="text-ellipsis">{{ $category->category_desc }}</span></td>
                        <td><span
                                class="text-ellipsis">{{ $category->products->merge($category->childrenProducts)->count() }}</span>
                        </td>
                        <td><span class="text-ellipsis">{{ $category->updated_at->format('d-m-Y') }}</span></td>
                        <td><span class="text-ellipsis">
                                @if ($category->category_status == 0)
                                    <a href="{{ route('category-product.inactive', ['id' => $category->category_id]) }}"><i
                                            class="fa-category fa fa-eye-slash"></i></a>
                                @else
                                    <a href="{{ route('category-product.active', ['id' => $category->category_id]) }}"><i
                                            class="fa-category fa fa-eye"></i></a>
                                @endif
                            </span></td>
                        <td>
                            <a href="{{ route('category-product.edit', ['id' => $category->category_id]) }}"
                                class="active category-action" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a href="{{ route('category-product.delete', ['id' => $category->category_id]) }}"
                                class="active category-action confirm_delete_category" ui-toggle-class="">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('backend/js/list.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
