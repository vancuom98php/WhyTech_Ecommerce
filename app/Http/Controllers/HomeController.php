<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use App\Traits\SortProductTrait;

class HomeController extends Controller
{
    use SortProductTrait;

    public function index(Request $request)
    {
        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game";
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game chính hãng";
        //--seo

        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_name', 'asc')->get()->take(5);
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $products = Product::where('product_status', 1)->latest()->get()->take(8);
        $top_products = Product::where('product_status', 1)->orderBy('product_sold', 'desc')->latest()->get()->take(4);
        $all_products = Product::where('product_status', 1)->get();
        $sliders = Slider::where('slider_status', 1)->orderBy('slider_id', 'desc')->get()->take(3);

        return view('pages.home', compact('categories', 'brands', 'products', 'top_products', 'all_products', 'sliders', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function show(Request $request)
    {
        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game";
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game chính hãng";
        //--seo

        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_order', 'asc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $all_products = Product::where('product_status', 1)->get();
        $product = Product::where('product_status', 1);

        if(isset($_GET['price_min']) && $_GET['price_max'])
            $product = $product->whereBetween('product_price', [$_GET['price_min'], $_GET['price_max']]);

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            $products =  $this->SortProduct($product, $sort_by);
        } else
            $products = $product->latest()->paginate(9);

        return view('pages.shop', compact('categories', 'brands', 'products', 'all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
