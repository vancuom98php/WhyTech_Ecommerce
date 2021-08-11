<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\AddShippingRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CheckoutController extends Controller
{
    public function login_to_checkout(Request $request)
    {
        //seo 
        $meta_desc = "Khách hàng đăng ký - đăng nhập";
        $meta_keywords = "WhyTech đăng ký, WhyTech đăng nhập, WhyTech Khách hàng, WhyTech mua sắm";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Đăng nhập tài khoản - Mua sắm online";
        //--seo

        return view('pages.checkout.login_checkout', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function logout_to_checkout()
    {
        session()->forget(['customer_id', 'shipping_id']);

        return redirect()->route('checkout.login-checkout');
    }

    /**
     * Customer Register
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(AddCustomerRequest $request)
    {
        $customer = new Customer();

        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_password = Hash::make($request->customer_password);
        $customer->save();

        session()->flash('notification', 'Tạo tài khoản thành công');

        $request->session()->put('customer_id', $customer->customer_id);
        $request->session()->put('customer_name', $customer->customer_name);

        return redirect()->route('checkout.checkout');
    }

    /**
     * Customer Login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;

        $authEmail = Customer::where('customer_email', $customer_email)->first();
        if (!$authEmail) {
            session()->flash('error_email', 'Email không tồn tại. Vui lòng kiểm tra lại');
            return redirect()->back();
        } else {
            $auth = Hash::check($customer_password, $authEmail->customer_password);
            if (!$auth) {
                session()->flash('error_pwd', 'Mật khẩu không chính xác. Vui lòng kiểm tra lại');
                return redirect()->back();
            } else {
                $request->session()->put('customer_id', $authEmail->customer_id);
                $request->session()->put('customer_name', $authEmail->customer_name);

                return redirect()->route('checkout.checkout');
            }
        }
    }

    public function checkout(Request $request)
    {
        //seo 
        $meta_desc = "Thông tin giao nhận hàng";
        $meta_keywords = "WhyTech giao nhận hàng";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thông tin giao nhận hàng";
        //--seo

        return view('pages.checkout.show_checkout', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function save_checkout(AddShippingRequest $request)
    {
        $shipping = new Shipping();

        $shipping->shipping_name = $request->shipping_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_address = $request->shipping_address;
        $shipping->shipping_notes = $request->shipping_notes;
        $shipping->save();

        $request->session()->put('shipping_id', $shipping->shipping_id);

        return redirect()->route('checkout.payment');
    }

    public function payment(Request $request)
    {
        $content = Cart::content();

        //seo 
        $meta_desc = "Thanh toán online";
        $meta_keywords = "WhyTech thanh toán online";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thanh toán online";
        //--seo

        return view('pages.checkout.payment', compact('content', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function place_order(Request $request)
    {
        //seo 
        $meta_desc = "Thanh toán online";
        $meta_keywords = "WhyTech thanh toán online";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thanh toán online";
        //--seo

        try {
            DB::beginTransaction();

            // Insert to payments
            $payment = Payment::create([
                'payment_method' => $request->payment_method,
                'payment_status' => 'Đang chờ xử lý',
            ]);

            // Insert to orders
            $order = Order::create([
                'customer_id' => session()->get('customer_id'),
                'shipping_id' => session()->get('shipping_id'),
                'payment_id' => $payment->payment_id,
                'order_total' => Cart::total(),
                'order_status' => 'Đang chờ xử lý',
            ]);

            // Insert to order details
            $content = Cart::content();

            foreach ($content as $value) {
                $order_details = OrderDetail::create([
                    'order_id' => $order->order_id,
                    'product_id' => $value->id,
                    'product_sales_quantity' => $value->qty,
                ]);
            }

            DB::commit();

            Cart::destroy();
            if ($payment->payment_method == 'ATM') {
                echo "Thanh toán bằng ATM (tạm thời)";
            } else {
                return view('pages.checkout.hand_cash', compact('meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return view('404');
        }
    }

    /**
     * Admin page
     */
    public function manage_order()
    {
        $orders = Order::latest()->paginate(3);

        return view('admin.order.manage_order', compact('orders'));
    }

    /**
     * Show Order Details
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_order($id)
    {
        $order = Order::find($id);

        return view('admin.order.view_order', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_order($id)
    {
        $order = Order::find($id)->delete();

        session()->flash('notification', 'Xóa đơn hàng thành công');
        return redirect()->back();
    }
}
