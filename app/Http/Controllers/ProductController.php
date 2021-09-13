<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
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
use App\Components\Recursive;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    use StorageImageTrait;

    public function getCategory($category_parent)
    {
        $categories = CategoryProduct::where('category_status', 1)->get();
        $category_recursive = new Recursive($categories);

        $htmlOption = $category_recursive->categoryRecursive($category_parent);

        return $htmlOption;
    }

    /**
     * Add products
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getCategory(null);
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.product.create_product', compact('htmlOption', 'brands'));
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
                'product_quantity' => $request->product_quantity,
                'product_sold' => 0,
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
        }
    }

    /**
     * Show all products
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('admin.product.all_product', compact('products'));
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
        $htmlOption = $this->getCategory($product->category_id);
        $brands = Brand::orderBy('brand_id', 'desc')->get();

        return view('admin.product.edit_product', compact('product', 'htmlOption', 'brands'));
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

            $product = Product::find($id);

            $dataProductUpdate = [
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_desc' => $request->product_desc,
                'product_content' => $request->product_content,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
            ];

            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'product_image', 'product');

            if (!empty($dataUploadFeatureImage)) {
                File::delete(public_path($product->product_image_path));
                $dataProductUpdate['product_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['product_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            $product->update($dataProductUpdate);
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
            $product = Product::find($id);

            File::delete(public_path($product->product_image_path));
            $product->delete();

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

    /**
     * Home function page
     * @param  \Illuminate\Http\Request  $request
     */
    public function show_details_product($product_slug, Request $request)
    {
        $product = Product::where('product_slug', $product_slug)->first();
        $related_products = Product::where('category_id', $product->category->category_id)->whereNotIn('product_id', [$product->product_id])->orderBy('category_id', 'desc')->get();
        $all_products = Product::where('product_status', 1)->get();
        $galleries = Gallery::where('product_id', $product->product_id)->get();

        //seo 
        $meta_desc = $product->product_desc;
        $meta_keywords = $product->product_name;
        $url_canonical = $request->url();
        $meta_title = "WhyTech | " . $product->product_name;
        //--seo

        return view('pages.product.show_details', compact('product', 'related_products', 'all_products', 'galleries', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
