<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
        $productId = $request->productId;
        $quantity = $request->quantity;
        $product = Product::find($productId);
        $session_id = substr(md5(microtime()), rand(0, 26), 5);

        $cart = session()->get('cart');

        if ($cart) {
            $is_available = 0;
            foreach ($cart as $key => $value) {
                if ($value['product_id'] == $productId) {
                    $is_available++;
                    $cart[$key] = [
                        'session_id' => $session_id,
                        'product_id' => $productId,
                        'product_info' => $product,
                        'product_quantity' => $value['product_quantity'] + $quantity,
                    ];
                }
            }
            if ($is_available == 0) {
                $cart[] = [
                    'session_id' => $session_id,
                    'product_id' => $productId,
                    'product_info' => $product,
                    'product_quantity' => $quantity,
                ];
            }
        } else {
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $productId,
                'product_info' => $product,
                'product_quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        session()->save();

        return view('pages.cart.mini_cart');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function show(Request $request)
    {
        $all_products = Product::where('product_status', 1)->get();

        //seo 
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng của bạn";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Giỏ hàng của bạn ";
        //--seo

        return view('pages.cart.show_cart', compact('all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->data;
        $cart = session()->get('cart');

        if ($cart == true) {
            foreach ($data as $value) {
                foreach ($cart as $key => $item) {
                    if ($cart[$key]['session_id'] == $value['session_id'])
                        $cart[$key]['product_quantity'] = $value['quantity'];
                }
            }
        }

        session()->put('cart', $cart);
        session()->save();

        return view('pages.cart.show_cart_ajax');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $cart = session()->get('cart');

        if ($cart == true) {
            session()->forget('cart');
            session()->forget('coupon');
        }
        session()->save();

        return view('pages.cart.show_cart_ajax');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($session_id)
    {
        $cart = session()->get('cart');

        if ($cart == true) {
            foreach ($cart as $key => $item) {
                if ($item['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
        }

        if (count($cart) > 0)
            session()->put('cart', $cart);
        else {
            session()->forget('cart');
            session()->forget('coupon');
        }

        session()->save();

        return view('pages.cart.mini_cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($session_id)
    {
        $cart = session()->get('cart');

        if ($cart == true) {
            foreach ($cart as $key => $item) {
                if ($item['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
        }

        if (count($cart) > 0)
            session()->put('cart', $cart);
        else {
            session()->forget('cart');
            session()->forget('coupon');
        }

        session()->save();

        return view('pages.cart.show_cart_ajax');
    }
}
