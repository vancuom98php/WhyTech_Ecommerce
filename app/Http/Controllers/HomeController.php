<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game"; 
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game chính hãng";
        //--seo

        $categories = CategoryProduct::where('category_status', 1)->orderBy('category_id', 'desc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_id', 'desc')->get();
        $products = Product::where('product_status', 1)->latest()->paginate(4);

        return view('pages.home', compact('categories', 'brands', 'products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
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
            
            if(!$products->total())
                session()->flash('notification', 'Rất tiếc, sản phẩm bạn tìm kiếm hiện không được bán hoặc đã hết hàng. Vui lòng tìm kiếm sản phẩm khác. Xin cảm ơn!');
        }

        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game"; 
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "Kết quả tìm kiếm: $keywords | WhyTech";
        //--seo

        return view('pages.product.search', compact('categories', 'brands', 'products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
