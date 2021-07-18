@extends('admin_layout')
@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật danh mục sản phẩm
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form"
                                action="{{ route('category-product.update', ['id' => $category->category_id]) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="category_name">Tên danh mục</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name"
                                        value="{{ $category->category_name }}" placeholder="Nhập tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="category_desc">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control " id="category_desc"
                                        name="category_desc"
                                        placeholder="Mô tả danh mục sản phẩm">{{ $category->category_desc }}</textarea>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật danh
                                    mục</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
