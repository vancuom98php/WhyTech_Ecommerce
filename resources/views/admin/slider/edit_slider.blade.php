@extends('admin_layout')

@section('admin_title', 'Admin - Slider')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Cập nhật Slider
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{ route('slider.update', ['id' => $slider->slider_id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="slider_name">Tên Slider</label>
                                    <input type="text" name="slider_name"
                                        class="form-control input-add-name @error('slider_name') is-invalid @enderror"
                                        id="slider_name" value="{{ $slider->slider_name }}"
                                        placeholder="Nhập tên slider">
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
                                        id="slider_image">
                                    <img width="100px" height="50px" src="{{ $slider->slider_image }}" alt="">
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
                                        id="slider_desc" name="slider_desc"
                                        placeholder="Mô tả">{{ $slider->slider_desc }}</textarea>
                                    @error('slider_desc')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" name="add_slider" class="btn btn-info">Cập nhật slider</button>
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
