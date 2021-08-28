@extends('admin_layout')

@section('admin_title', 'Admin - FeeShip')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Thêm phí vận chuyển
                    </header>
                    <div class="panel-body">
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <div class="position-center">
                            <form role="form" action="{{ route('delivery.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="">Tỉnh/Thành phố</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province @error('province') is-invalid @enderror">
                                        <option value="">-----Chọn Tỉnh/Thành phố-----</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Quận/Huyện</label>
                                    <select name="district" id="district" class="form-control input-sm m-bot15 choose district @error('district') is-invalid @enderror">
                                        <option value="">-----Chọn Quận/Huyện-----</option>
                                    </select>
                                    @error('district')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Xã/Phường</label>
                                    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward @error('ward') is-invalid @enderror">
                                        <option value="">-----Chọn Xã/Phường-----</option>
                                    </select>
                                    @error('ward')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="fee_feeship">Phí vận chuyển (VNĐ)</label>
                                    <input type="text" name="fee_feeship"
                                        class="form-control input-add-name @error('fee_feeship') is-invalid @enderror fee_feeship"
                                        id="fee_feeship" value="{{ old('fee_feeship') }}"
                                        placeholder="Nhập tên thương hiệu">
                                    @error('fee_feeship')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" name="add_feeship" class="btn btn-info add_feeship">Thêm phí vận chuyển</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('backend/js/feeship_ajax.js') }}"></script>

@endsection
