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
}
