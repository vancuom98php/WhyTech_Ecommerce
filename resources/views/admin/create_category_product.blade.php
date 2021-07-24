@extends('admin_layout')
@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Thêm danh mục sản phẩm
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{ route('category-product.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="category_name">Tên danh mục</label>
                                    <input type="text" name="category_name"
                                        class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                                        placeholder="Nhập tên danh mục">
                                    @error('category_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="category_desc">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5"
                                        class="form-control @error('category_desc') is-invalid @enderror" id="category_desc"
                                        name="category_desc" placeholder="Mô tả danh mục sản phẩm"></textarea>
                                    @error('category_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Hiển thị</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh
                                    mục</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
