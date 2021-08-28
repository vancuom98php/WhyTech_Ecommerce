<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Feeship;
use App\Http\Requests\AddFeeshipRequest;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeships = Feeship::orderBy('province_id', 'asc')->orderBy('district_id', 'asc')->orderBy('ward_id', 'asc')->paginate(20);

        return view('admin.delivery.all_delivery', compact('feeships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::orderBy('province_id', 'asc')->get();

        return view('admin.delivery.create_delivery', compact('provinces'));
    }

    public function select(Request $request)
    {
        $data = $request->all();

        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'province') {
                if ($data['id'] < 10)
                    $province_id = '0' . $data['id'];
                else
                    $province_id = $data['id'];
                $districts = District::where('province_id', $province_id)->orderBy('district_id', 'asc')->get();
                $output = '<option value="">-----Chọn Quận/Huyện-----</option>';
                foreach ($districts as $district)
                    $output .= '<option value="' . $district->district_id . '">' . $district->district_name . '</option>';
            } else {
                if ($data['id'] < 10)
                    $district_id = '00' . $data['id'];
                elseif ($data['id'] < 100)
                    $district_id = '0' . $data['id'];
                else
                    $district_id = $data['id'];
                $wards = Ward::where('district_id', $district_id)->orderBy('ward_id', 'asc')->get();
                $output = '<option value="">-----Chọn Xã/Phường-----</option>';
                foreach ($wards as $ward)
                    $output .= '<option value="' . $ward->ward_id . '">' . $ward->ward_name . '</option>';
            }
        }
        echo $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFeeshipRequest $request)
    {
        $data = $request->all();

        if ($data['province'] < 10)
            $province_id = '0' . $data['province'];
        else
            $province_id = $data['province'];
        
        if ($data['district'] < 10)
            $district_id = '00' . $data['district'];
        elseif ($data['district'] < 100)
            $district_id = '0' . $data['district'];
        else
            $district_id = $data['district'];

        if ($data['ward'] < 10)
            $ward_id = '0000' . $data['ward'];
        elseif ($data['ward'] < 100)
            $ward_id = '000' . $data['ward'];
        elseif ($data['ward'] < 1000)
            $ward_id = '00' . $data['ward'];
        elseif ($data['ward'] < 10000)
            $ward_id = '0' . $data['ward'];
        else
            $ward_id = $data['ward'];

        $feeship = new Feeship();

        $feeship->province_id = $province_id;
        $feeship->district_id = $district_id;
        $feeship->ward_id =  $ward_id;
        $feeship->fee_feeship = $data['fee_feeship'];
        $feeship->save();

        session()->flash('notification', 'Thêm phí vận chuyển thành công');

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
        $feeship = Feeship::find($id);
        $provinces = Province::orderBy('province_id', 'asc')->get();
        $districts = District::where('province_id', optional($feeship->province)->province_id)->orderBy('district_id', 'asc')->get();
        $wards = Ward::where('district_id', optional($feeship->district)->district_id)->orderBy('ward_id', 'asc')->get();

        return view('admin.delivery.edit_delivery', compact('feeship', 'provinces', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddFeeshipRequest $request, $id)
    {
        $data = $request->all();

        if ($data['province'] < 10)
            $province_id = '0' . $data['province'];
        else
            $province_id = $data['province'];

        if ($data['district'] < 10)
            $district_id = '00' . $data['district'];
        elseif ($data['district'] < 100)
            $district_id = '0' . $data['district'];
        else
            $district_id = $data['district'];

        if ($data['ward'] < 10)
            $ward_id = '0000' . $data['ward'];
        elseif ($data['ward'] < 100)
            $ward_id = '000' . $data['ward'];
        elseif ($data['ward'] < 1000)
            $ward_id = '00' . $data['ward'];
        elseif ($data['ward'] < 10000)
            $ward_id = '0' . $data['ward'];
        else
            $ward_id = $data['ward'];

        $feeship = Feeship::find($id)->update([
            'province_id' => $province_id,
            'district_id' => $district_id,
            'ward_id' => $ward_id,
            'fee_feeship' => $data['fee_feeship']
        ]);

        session()->flash('notification_update-success', 'Cập nhật phí vận chuyển thành công');
        return redirect()->route('delivery.all');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $feeship = Feeship::find($id)->delete();

        session()->flash('notification', 'Xóa phí vận chuyển thành công');
        return redirect()->back();
    }
}
