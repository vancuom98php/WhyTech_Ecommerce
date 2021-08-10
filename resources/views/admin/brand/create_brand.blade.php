@extends('admin_layout')

@section('admin_title', 'Admin - Brand')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Thêm thương hiệu sản phẩm
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{ route('brand.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="brand_name">Tên thương hiệu</label>
                                    <input type="text" name="brand_name"
                                        class="form-control input-add-name @error('brand_name') is-invalid @enderror" id="brand_name"
                                        value="{{ old('brand_name') }}" placeholder="Nhập tên thương hiệu">
                                    @error('brand_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="brand_desc">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="5"
                                        class="form-control input-add @error('brand_desc') is-invalid @enderror" id="brand_desc"
                                        name="brand_desc" placeholder="Mô tả thương hiệu sản phẩm">{{ old('brand_desc') }}</textarea>
                                    @error('brand_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Hiển thị</label>
                                    <select name="brand_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_brand" class="btn btn-info">Thêm thương
                                    hiệu</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
