@extends('admin_layout')

@section('admin_title', 'Admin - Gallery - ' . $product->product_name)

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        {{ $product->product_name }} - Thư viện ảnh
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" id="notification" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger" style="font-weight: bold;">
                                {!! session('error') !!}
                            </div>
                        @endif
                        <input class="product_id" type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <form role="form" method="post" enctype="multipart/form-data"
                            action="{{ route('gallery.store', ['id' => $product->product_id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <input type="file" name="gallery_images[]" class="form-control input-add"
                                        id="gallery_images" accept="image/*" multiple>
                                    <div id="error_gallery" class="invalid-feedback-category-product" role="alert">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-sm btn-success" id="upload_gallery" type="submit"
                                        name="upload_gallery">Tải ảnh</button>
                                </div>
                            </div>
                        </form>
                        <form action="" method="post">
                            @csrf
                            <div id="gallery_load">

                            </div>
                        </form>
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
    <script src="{{ asset('backend/js/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/gallery.js') }}"></script>

@endsection
