@extends('admin_layout')

@section('admin_title', 'Admin - Slider')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Thêm slider
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{ route('slider.save') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="slider_name">Tên slider</label>
                                    <input type="text" name="slider_name"
                                        class="form-control input-add-name @error('slider_name') is-invalid @enderror"
                                        id="slider_name" value="{{ old('slider_name') }}" placeholder="Nhập tên Slider">
                                    @error('slider_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="slider_image">Hình ảnh</label>
                                    <input type="file" name="slider_image"
                                        class="form-control input-add @error('slider_image') is-invalid @enderror"
                                        id="slider_image" value="{{ old('slider_image') }}">
                                    @error('slider_image')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="slider_desc">Mô tả</label>
                                    <textarea style="resize: none" rows="3"
                                        class="form-control input-add @error('slider_desc') is-invalid @enderror"
                                        id="slider_desc" name="slider_desc" placeholder="Mô tả">{{ old('slider_desc') }}</textarea>
                                    @error('slider_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Hiển thị</label>
                                    <select name="slider_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_slider" class="btn btn-info">Thêm Slider</button>
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
