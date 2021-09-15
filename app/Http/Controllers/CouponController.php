<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Requests\AddCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupon.all_coupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create_coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCouponRequest $request)
    {
        $data = $request->all();

        $dataCouponCreate = [
            'coupon_name' => $data['coupon_name'],
            'coupon_code' => $data['coupon_code'],
            'coupon_time' => $data['coupon_time'],
            'coupon_condition' => $data['coupon_condition'],
            'coupon_number' => $data['coupon_number'],
        ];

        $coupon = Coupon::create($dataCouponCreate);

        session()->flash('notification', 'Thêm mã giảm giá thành công');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_time' => $request->coupon_time,
            'coupon_condition' => $request->coupon_condition,
            'coupon_number' => $request->coupon_number,
        ]);

        session()->flash('notification_update-success', 'Cập nhật mã giảm giá thành công');
        return redirect()->route('coupon.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $coupon = Coupon::find($id)->delete();

        session()->flash('notification', 'Xóa mã giảm giá thành công');
        return redirect()->back();
    }

    /**
     * Unset the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function unset()
    {
        $coupon = session()->get('coupon');
        
        if($coupon) {
            session()->forget('coupon');
            session()->save();
            session()->flash('success_coupon', 'Gỡ mã giảm giá thành công');
        }

        return redirect()->back();
    }

    public function check(Request $request)
    {
        $coupon_code = $request->coupon;
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();

        if ($coupon) {
            if ($coupon->coupon_time > 0) {
                $coupon_session = session()->get('coupon');
                if ($coupon_session) {
                    $is_available = false;
                    if (!$is_available) {
                        $coupon_arr[] = [
                            'coupon_name' => $coupon->coupon_name,
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        ];
                        session()->put('coupon', $coupon_arr);
                    }
                } else {
                    $coupon_arr[] = [
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    ];
                    session()->put('coupon', $coupon_arr);
                }
                session()->save();

                session()->flash('success_coupon', 'Áp dụng mã giảm giá thành công!');
                return redirect()->back();
            }
        } else {
            session()->forget('coupon');
            session()->save();

            session()->flash('error_coupon', 'Mã giảm giá không tồn tại! Vui lòng kiểm tra lại');
            return redirect()->back();
        }
    }
}
