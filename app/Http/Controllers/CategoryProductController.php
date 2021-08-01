<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use Illuminate\Support\Str;

class CategoryProductController extends Controller
{
    /**
     * Add category products
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_category_product');
    }

    /**
     * Save category products
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryProductRequest $request)
    {
        $categoryProduct = new CategoryProduct();

        $categoryProduct->category_name = $request->category_name;
        $categoryProduct->category_product_slug = Str::slug($request->category_name, '-');
        $categoryProduct->category_desc = $request->category_desc;
        $categoryProduct->category_status = $request->category_status;
        $categoryProduct->save();

        session()->flash('notification', 'Thêm danh mục sản phẩm thành công');

        return redirect()->back();
    }

    /**
     * Show all category products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryProduct::latest()->paginate(2);

        return view('admin.all_category_product', compact('categories'));
    }

    /**
     * Active category products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $category = CategoryProduct::find($id)->update(['category_status' => 0]);

        session()->flash('notification', 'Ẩn danh mục danh mục sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive category products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $category = CategoryProduct::find($id)->update(['category_status' => 1]);

        session()->flash('notification', 'Hiện danh mục danh mục sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Edit category products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryProduct::find($id);
        return view('admin.edit_category_product', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryProductRequest $request, $id)
    {
        $category = CategoryProduct::find($id)->update([
            'category_name' => $request->category_name,
            'category_product_slug' => Str::slug($request->category_name, '-'),
            'category_desc' => $request->category_desc
        ]);

        session()->flash('notification_update-success', 'Cập nhật danh mục danh mục sản phẩm thành công');
        return redirect()->route('category-product.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = CategoryProduct::find($id)->delete();

        session()->flash('notification', 'Xóa danh mục danh mục sản phẩm thành công');
        return redirect()->back();
    }

    /** 
     *  Home function page
     */
    public function show_category_home($id) {
        $categories = CategoryProduct::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $productByCategoryId = Product::where('category_id', $id)->latest()->paginate(4);
        $categoryById = CategoryProduct::find($id);

        return view('pages.category.show_category', compact('categories', 'brands', 'productByCategoryId', 'categoryById'));
    }
}
