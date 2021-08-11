<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Brand;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->product_id_hidden;
        $quantity = $request->quantity;
        $product = Product::find($productId);

        $dataAddToCart = [
            'id' => $product->product_id,
            'qty' => $quantity,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'weight' => 0,
            'name' => $product->product_name,
            'options' => [
                'image' => $product->product_image_path,
            ]
        ];

        Cart::add($dataAddToCart);

        return redirect()->route('cart.show');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function show(Request $request)
    {
        $content = Cart::content();

        //seo 
        $meta_desc = "Giỏ hàng của bạn"; 
        $meta_keywords = "Giỏ hàng của bạn";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Giỏ hàng của bạn ";
        //--seo

        return view('pages.cart.show_cart', compact('content', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Cart::update($id, 0);

        session()->flash('notification', 'Đã xóa sản phẩm khỏi giỏ hàng');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_quantity(Request $request)
    {
        $rowId = $request->cart_rowId;
        $quantity = $request->cart_quantity;

        Cart::update($rowId, $quantity);

        return redirect()->back();
    }
}
