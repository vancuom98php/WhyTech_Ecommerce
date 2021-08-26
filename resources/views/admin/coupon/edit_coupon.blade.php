@extends('admin_layout')

@section('admin_title', 'Admin - Coupon')

@section('admin_content')

    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading dashboard-heading">
                        Cập nhật mã giảm giá
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{ route('coupon.update', ['id' => $coupon->coupon_id]) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="add_category_label" for="coupon_name">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name"
                                        class="form-control input-add-name @error('coupon_name') is-invalid @enderror"
                                        id="coupon_name" value="{{ $coupon->coupon_name }}"
                                        placeholder="Nhập tên mã giảm giá">
                                    @error('coupon_name')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="coupon_code">Mã giảm giá</label>
                                    <input type="text" name="coupon_code"
                                        class="form-control input-add @error('coupon_code') is-invalid @enderror"
                                        id="coupon_code" value="{{ $coupon->coupon_code }}"
                                        placeholder="Nhập mã giảm giá">
                                    @error('coupon_code')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="coupon_time">Số lượng mã</label>
                                    <input type="text" name="coupon_time"
                                        class="form-control input-add @error('coupon_time') is-invalid @enderror"
                                        id="coupon_time" value="{{ $coupon->coupon_time }}"
                                        placeholder="Nhập tên mã giảm giá">
                                    @error('coupon_time')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="">Loại mã giảm giá</label>
                                    <select name="coupon_condition" class="form-control input-sm m-bot15">
                                        @if ($coupon->coupon_condition == 1)
                                            <option value="1" selected>Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo số tiền</option>
                                        @else
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2" selected>Giảm theo số tiền</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="add_category_label" for="coupon_number">Số % hoặc số tiền giảm</label>
                                    <input type="number" name="coupon_number"
                                        class="form-control input-add @error('coupon_number') is-invalid @enderror"
                                        id="coupon_number" value="{{ $coupon->coupon_number }}"
                                        placeholder="Nhập giá trị giảm giá">
                                    @error('coupon_number')
                                        <div class="invalid-feedback-category-product" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" name="add_brand" class="btn btn-info">Cập nhật mã giảm giá</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
