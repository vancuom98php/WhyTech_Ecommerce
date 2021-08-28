@extends('admin_layout')

@section('admin_title', 'Admin - FeeShip')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Cập nhật phí vận chuyển
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{ route('delivery.update', ['id' => $feeship->fee_id]) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="">Tỉnh/Thành phố</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province @error('province') is-invalid @enderror">
                                        <option value="">-----Chọn Tỉnh/Thành phố-----</option>
                                        @foreach ($provinces as $province)
                                            @if (optional($feeship->province)->province_id == $province->province_id)
                                                <option value="{{ $province->province_id }}" selected>{{ $province->province_name }}</option>
                                            @else
                                                <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                            @endif
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
                                    <select name="district" id="district" class="form-control input-sm m-bot15 choose district">
                                        <option value="">-----Chọn Quận/Huyện-----</option>
                                        @foreach ($districts as $district)
                                            @if (optional($feeship->district)->district_id == $district->district_id)
                                                <option value="{{ $district->district_id }}" selected>{{ $district->district_name }}</option>
                                            @else
                                                <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Xã/Phường</label>
                                    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
                                        <option value="">-----Chọn Xã/Phường-----</option>
                                        @foreach ($wards as $ward)
                                            @if (optional($feeship->ward)->ward_id == $ward->ward_id)
                                                <option value="{{ $ward->ward_id }}" selected>{{ $ward->ward_name }}</option>
                                            @else
                                                <option value="{{ $ward->ward_id }}">{{ $ward->ward_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="fee_feeship">Phí vận chuyển (VNĐ)</label>
                                    <input type="text" name="fee_feeship"
                                        class="form-control input-add-name @error('fee_feeship') is-invalid @enderror fee_feeship"
                                        id="fee_feeship" value="{{ $feeship->fee_feeship }}"
                                        placeholder="Nhập tên thương hiệu">
                                    @error('fee_feeship')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" name="add_feeship" class="btn btn-info">Cập nhật phí vận chuyển</button>
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