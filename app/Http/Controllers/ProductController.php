<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
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
     * Add products
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_product');
    }

    /**
     * Save products
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name, '-');
        $product->product_desc = $request->product_desc;
        $product->product_status = $request->product_status;
        $product->save();

        session()->flash('notification', 'Thêm thương hiệu sản phẩm thành công');

        return redirect()->back();
    }

    /**
     * Show all products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(2);

        return view('admin.all_brand', compact('products'));
    }

    /**
     * Active products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $brand = Product::find($id)->update(['brand_status' => 0]);

        session()->flash('notification', 'Ẩn thương hiệu sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $brand = Product::find($id)->update(['brand_status' => 1]);

        session()->flash('notification', 'Hiện thương hiệu sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Product::find($id);
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
        $brand = Product::find($id)->update([
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
        $brand = Product::find($id)->delete();

        session()->flash('notification', 'Xóa thương hiệu sản phẩm thành công');
        return redirect()->back();
    }
}
