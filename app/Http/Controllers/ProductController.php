<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use StorageImageTrait;

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
        $categories = CategoryProduct::orderBy('category_id', 'desc')->get();
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.create_product', compact('categories', 'brands'));
    }

    /**
     * Save products
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $dataProductCreate = [
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_status' => $request->product_status,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'product_image', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['product_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['product_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $product = Product::create($dataProductCreate);

            // Insert tags for products
            $tagIds = [];
            if (!empty($request->product_tags)) {
                foreach ($request->product_tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = Tag::firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->tag_id;
                }
            }
            $product->tags()->attach($tagIds);

            DB::commit();

            session()->flash('notification', 'Thêm sản phẩm thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return view('404');
        }
    }

    /**
     * Show all products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(2);

        return view('admin.all_product', compact('products'));
    }

    /**
     * Active products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $product = Product::find($id)->update(['product_status' => 0]);

        session()->flash('notification', 'Ẩn sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Inactive products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $product = Product::find($id)->update(['product_status' => 1]);

        session()->flash('notification', 'Hiện sản phẩm thành công');
        return redirect()->back();
    }

    /**
     * Edit products
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = CategoryProduct::orderBy('category_id', 'desc')->get();
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.edit_product', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $dataProductUpdate = [
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'product_image', 'product');

            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['product_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['product_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $product = Product::find($id)->update($dataProductUpdate);
            $product = Product::find($id);

            // Insert tags for products
            $tagIds = [];
            if (!empty($request->product_tags)) {
                foreach ($request->product_tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = Tag::firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->tag_id;
                }
            }
            $product->tags()->sync($tagIds);

            DB::commit();

            session()->flash('notification_update-success', 'Cập nhật sản phẩm thành công');
            return redirect()->route('product.all');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return view('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $product = Product::find($id)->delete();

            session()->flash('notification', 'Xóa sản phẩm thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage . '---Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
