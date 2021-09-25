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
use App\Components\Recursive;
use App\Traits\SortProductTrait;

class CategoryProductController extends Controller
{
    use SortProductTrait;

    public function getCategory($category_parent)
    {
        $categories = CategoryProduct::where('category_status', 1)->get();
        $category_recursive = new Recursive($categories);

        $htmlOption = $category_recursive->categoryRecursive($category_parent);

        return $htmlOption;
    }

    /**
     * Add category products
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->getCategory(null);

        return view('admin.category.create_category_product', compact('htmlOption'));
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
        $categoryProduct->category_parent = $request->category_parent;
        $categoryProduct->category_product_slug = Str::slug($request->category_name, '-');
        $categoryProduct->category_desc = $request->category_desc;
        $categoryProduct->meta_keywords = $request->meta_keywords;
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
        $categories = CategoryProduct::orderBy('category_parent', 'asc')->orderBy('category_order', 'asc')->get();
        $sub_categories = CategoryProduct::all();

        return view('admin.category.all_category_product', compact('categories', 'sub_categories'));
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

        $htmlOption = $this->getCategory($category->category_parent);

        return view('admin.category.edit_category_product', compact('category', 'htmlOption'));
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
            'category_parent' => $request->category_parent,
            'category_product_slug' => Str::slug($request->category_name, '-'),
            'category_desc' => $request->category_desc,
            'meta_keywords' => $request->meta_keywords
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
     * @param  \Illuminate\Http\Request  $request
     */
    public function show_category_home($category_product_slug, Request $request)
    {
        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_order', 'asc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $categoryBySlug = CategoryProduct::where('category_product_slug', $category_product_slug)->first();

        if ($categoryBySlug->category_parent != 0) {
            $productByCategorySlugs = Product::select('products.*')->where('product_status', 1)->join('category_products', 'category_products.category_id', '=', 'products.category_id')
                ->where('category_product_slug', $category_product_slug);

            if (isset($_GET['price_min']) && $_GET['price_max'])
                $productByCategorySlugs = $productByCategorySlugs->whereBetween('product_price', [$_GET['price_min'], $_GET['price_max']]);

            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                $productByCategorySlug =  $this->SortProduct($productByCategorySlugs, $sort_by);
            } else
                $productByCategorySlug =  $productByCategorySlugs->latest()->paginate(9);
        } else {
            $categoryBySlug = CategoryProduct::with(['products', 'childrenProducts'])->where('category_product_slug', $category_product_slug)->first();
            $productByCategorySlugs = $categoryBySlug->products->merge($categoryBySlug->childrenProducts);

            if (isset($_GET['price_min']) && $_GET['price_max'])
                $productByCategorySlugs = $productByCategorySlugs->whereBetween('product_price', [$_GET['price_min'], $_GET['price_max']]);

            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                $productByCategorySlug = $this->SortProductByCategory($productByCategorySlugs, $sort_by);
            } else
                $productByCategorySlug = $productByCategorySlugs->sortByDesc('created_at')->paginate(9);
        }

        $all_products = Product::where('product_status', 1)->get();

        //seo 
        $meta_desc = $categoryBySlug->category_desc;
        $meta_keywords = $categoryBySlug->meta_keywords;
        $url_canonical = $request->url();
        $meta_title = "WhyTech | " . $categoryBySlug->category_name;
        //--seo

        return view('pages.category.show_category', compact('categories', 'brands', 'productByCategorySlug', 'categoryBySlug', 'all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function sort(Request $request)
    {
        $Ids = $request->page_id_array;

        foreach ($Ids as $key => $id) {
            $category = CategoryProduct::find($id)->update([
                'category_order' => $key,
            ]);
        }
    }
}
