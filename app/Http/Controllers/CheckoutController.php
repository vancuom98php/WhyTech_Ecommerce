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
    public function login_to_checkout()
    {
        return view('pages.checkout.login_checkout');
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

    public function checkout()
    {
        return view('pages.checkout.show_checkout');
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

    public function payment()
    {
        $content = Cart::content();

        return view('pages.checkout.payment', compact('content'));
    }

    public function place_order(Request $request)
    {
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
                return view('pages.checkout.hand_cash');
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

        return view('admin.manage_order', compact('orders'));
    }

    /**
     * Show Order Details
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_order($id)
    {
        $order = Order::find($id);

        return view('admin.view_order', compact('order'));
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
