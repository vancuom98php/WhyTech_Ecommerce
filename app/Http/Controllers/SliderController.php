<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\AddSliderRequest;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class SliderController extends Controller
{
    use StorageImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('slider_id', 'desc')->paginate(5);

        return view('admin.slider.all_slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSliderRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataSliderCreate = [
                'slider_name' => $request->slider_name,
                'slider_desc' => $request->slider_desc,
                'slider_status' => $request->slider_status,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'slider_image', 'slider');

            if (!empty($dataUploadFeatureImage)) {
                $dataSliderCreate['slider_image'] = $dataUploadFeatureImage['file_path'];
            }

            $slider = Slider::create($dataSliderCreate);

            DB::commit();

            session()->flash('notification', 'Thêm slider thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
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
     * Active slider
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $slider = Slider::find($id)->update(['slider_status' => 0]);

        session()->flash('notification', 'Ẩn Slider thành công');
        return redirect()->back();
    }

    /**
     * Inactive slider
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $slider = Slider::find($id)->update(['slider_status' => 1]);

        session()->flash('notification', 'Hiện Slider thành công');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.slider.edit_slider', compact('slider'));
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
        try {
            DB::beginTransaction();
            $slider = Slider::find($id);

            $dataSliderUpdate = [
                'slider_name' => $request->slider_name,
                'slider_desc' => $request->slider_desc,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'slider_image', 'slider');

            if (!empty($dataUploadFeatureImage)) {
                File::delete(public_path($slider->slider_image));
                $dataSliderUpdate['slider_image'] = $dataUploadFeatureImage['file_path'];
            }

            $slider->update($dataSliderUpdate);

            DB::commit();

            session()->flash('notification_update-success', 'Cập nhật slider thành công');
            return redirect()->route('slider.all');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
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
        $slider = Slider::find($id);

        File::delete(public_path($slider->slider_image));
        $slider->delete();
    }
}
