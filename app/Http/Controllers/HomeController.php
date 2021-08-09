<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $products = Product::where('product_status', 1)->latest()->paginate(4);

        return view('pages.home', compact('categories', 'brands', 'products'));
    }

    public function search(Request $request)
    {
        $categories = CategoryProduct::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $keywords = $request->keywords_submit;

        if (empty($keywords))
            $products = Product::where('product_status', 1)->latest()->paginate(4);
        else {
            $products = Product::select('products.*')->where('product_status', 1)->where('product_name', 'like', "%$keywords%")
                ->join('brands', 'brands.brand_id', '=', 'products.brand_id')->orWhere('brand_name', 'like', "%$keywords%")
                ->join('category_products', 'category_products.category_id', '=', 'products.category_id')->orWhere('category_name', 'like', "%$keywords%")
                ->latest()->paginate(4);
        }

        return view('pages.product.search', compact('categories', 'brands', 'products'));
    }
}
