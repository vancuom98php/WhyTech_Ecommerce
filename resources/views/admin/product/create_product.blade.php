@extends('admin_layout')

@section('admin_title', 'Admin - Product')

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
                        <div class="position-center">
                            <form role="form" action="{{ route('product.save') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="product_name">Tên sản phẩm</label>
                                    <input type="text" name="product_name"
                                        class="form-control input-add-name @error('product_name') is-invalid @enderror"
                                        id="product_name" value="{{ old('product_name') }}" placeholder="Nhập tên sản phẩm">
                                    @error('product_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_image">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image"
                                        class="form-control input-add @error('product_image') is-invalid @enderror"
                                        id="product_image" value="{{ old('product_image') }}">
                                    @error('product_image')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_price">Giá sản phẩm (VNĐ)</label>
                                    <input type="text" name="product_price"
                                        class="form-control input-add @error('product_price') is-invalid @enderror"
                                        id="product_price" placeholder="Nhập tên sản phẩm" value="{{ old('product_price') }}">
                                    @error('product_price')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_quantity">Số lượng</label>
                                    <input type="text" name="product_quantity"
                                        class="form-control input-add @error('product_quantity') is-invalid @enderror"
                                        id="product_quantity" placeholder="Nhập tên sản phẩm" value="{{ old('product_quantity') }}">
                                    @error('product_quantity')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_desc">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="3"
                                        class="form-control input-add @error('product_desc') is-invalid @enderror"
                                        id="product_desc" name="product_desc" placeholder="Mô tả sản phẩm">{{ old('product_desc') }}</textarea>
                                    @error('product_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="product_content">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="10"
                                        class="form-control tinymce_editor input-add @error('product_content') is-invalid @enderror"
                                        id="product_content" name="product_content"
                                        placeholder="Nội dung sản phẩm">{{ old('product_content') }}</textarea>
                                    @error('product_content')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="add_category_label" for="product_tags">Nhập các tag cho sản
                                        phẩm</label>
                                    <select class="form-control input-add tags_select_choose" id="product_tags"
                                        name="product_tags[]" multiple="true" style="font-weight: normal">
                                    </select>
                                    @error('product_tags')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="add_category_label" for="">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn danh mục sản phẩm</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Thương hiệu sản phẩm</label>
                                    <select name="brand_id" class="form-control input-sm m-bot15">
                                        <option value="">Chọn thương hiệu sản phẩm</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
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

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js"
        integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('backend/js/add.js') }}"></script>

@endsection
