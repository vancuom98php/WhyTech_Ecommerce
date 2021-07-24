<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\AddBrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Add brands
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_brand');
    }

    /**
     * Save brands
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrandRequest $request)
    {
        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name, '-');
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();

        session()->flash('notification', 'Thêm thương hiệu sản phẩm thành công');

        return redirect()->back();
    }

    /**
     * Show all brands
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(2);

        return view('admin.all_brand', compact('brands'));
    }

    /**
     * Active brands
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $brand = Brand::find($id)->update(['brand_status' => 0]);

        session()->flash('notification', 'Ẩn thương hiệu sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive brands
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $brand = Brand::find($id)->update(['brand_status' => 1]);

        session()->flash('notification', 'Hiện thương hiệu sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive brands
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.edit_brand', compact('brand'));
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
        $brand = Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_desc' => $request->brand_desc
        ]);

        session()->flash('notification_update-success', 'Cập nhật thương hiệu sản phẩm thành công');
        return redirect()->route('brand.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $brand = Brand::find($id)->delete();

        session()->flash('notification', 'Xóa thương hiệu sản phẩm thành công');
        return redirect()->back();
    }
}
