@extends('admin_layout')
@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Thêm sản phẩm
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <div class="position-center dashboard-heading">
                            <form role="form" action="{{ route('product.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="product_name">Tên sản phẩm</label>
                                    <input type="text" name="product_name"
                                        class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                                        placeholder="Nhập tên sản phẩm">
                                    @error('product_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_image">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image"
                                        class="form-control @error('product_image') is-invalid @enderror" id="product_image">
                                    @error('product_image')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_price">Giá sản phẩm</label>
                                    <input type="text" name="product_price"
                                        class="form-control @error('product_price') is-invalid @enderror" id="product_price"
                                        placeholder="Nhập tên sản phẩm">
                                    @error('product_price')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_desc">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="3"
                                        class="form-control @error('product_desc') is-invalid @enderror" id="product_desc"
                                        name="product_desc" placeholder="Mô tả sản phẩm"></textarea>
                                    @error('product_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_content">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5"
                                        class="form-control @error('product_content') is-invalid @enderror" id="product_content"
                                        name="product_content" placeholder="Nội dung sản phẩm"></textarea>
                                    @error('product_content')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Danh mục sản phẩm</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Thương hiệu sản phẩm</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Apple</option>
                                        <option value="1">Dell</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
