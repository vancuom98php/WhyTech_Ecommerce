<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Feeship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\AddShippingRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

        $all_products = Product::where('product_status', 1)->get();

        return view('pages.checkout.login_checkout', compact('all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function register_to_checkout(Request $request)
    {
        //seo 
        $meta_desc = "Khách hàng đăng ký - đăng nhập";
        $meta_keywords = "WhyTech đăng ký, WhyTech đăng nhập, WhyTech Khách hàng, WhyTech mua sắm";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Đăng ký tài khoản - Mua sắm online";
        //--seo

        $all_products = Product::where('product_status', 1)->get();

        return view('pages.checkout.register_checkout', compact('all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function logout_to_checkout()
    {
        session()->forget(['customer_id', 'shipping_id', 'shipping_feeship']);
        session()->save();

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

        $all_products = Product::where('product_status', 1)->get();

        $provinces = Province::orderBy('province_id', 'asc')->get();

        return view('pages.checkout.show_checkout', compact('all_products', 'provinces', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function save_checkout(AddShippingRequest $request)
    {
        $data = $request->all();

        if ($data['province'] < 10)
            $province_id = '0' . $data['province'];
        else
            $province_id = $data['province'];

        if ($data['district'] < 10)
            $district_id = '00' . $data['district'];
        elseif ($data['district'] < 100)
            $district_id = '0' . $data['district'];
        else
            $district_id = $data['district'];

        if ($data['ward'] < 10)
            $ward_id = '0000' . $data['ward'];
        elseif ($data['ward'] < 100)
            $ward_id = '000' . $data['ward'];
        elseif ($data['ward'] < 1000)
            $ward_id = '00' . $data['ward'];
        elseif ($data['ward'] < 10000)
            $ward_id = '0' . $data['ward'];
        else
            $ward_id = $data['ward'];

        $feeship = Feeship::where('province_id', $province_id)->where('district_id', $district_id)->where('ward_id', $ward_id)->first();

        if ($feeship == null) {
            $feeship = Feeship::where('province_id', $province_id)->where('district_id', $district_id)->first();
            if ($feeship == null) {
                $feeship = Feeship::where('province_id', $province_id)->first();
            }
        }

        if ($feeship == null)
            session()->put('shipping_feeship', 0);
        else
            session()->put('shipping_feeship', $feeship->fee_feeship);
        session()->save();

        $province = Province::find($province_id);
        $district = District::find($district_id);
        $ward = Ward::find($ward_id);

        $shipping = new Shipping();

        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'] . ', ' . $ward->ward_name . ', ' . $district->district_name . ', ' . $province->province_name;
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->save();

        $request->session()->put('shipping_id', $shipping->shipping_id);
        $request->session()->put('shipping_name', $shipping->shipping_name);
        $request->session()->put('shipping_phone', $shipping->shipping_phone);
        $request->session()->put('shipping_address', $shipping->shipping_address);

        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        //seo 
        $meta_desc = "Thanh toán online";
        $meta_keywords = "WhyTech thanh toán online";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thanh toán online";
        //--seo
        $data =  $request->all();
        $cart = session()->get('cart');
        $coupons = session()->get('coupon');
        $order_code = substr(md5(microtime()), rand(0, 26), 5);

        if ($cart == true) {
            $total = 0;

            foreach ($cart as $item)
                $total += $item['product_quantity'] * $item['product_info']->product_price;

            $total += session()->get('shipping_feeship');

            if ($coupons) {
                foreach ($coupons as $coupon) {
                    if ($coupon['coupon_condition'] == 1)
                        $total -= $total * ($coupon['coupon_number'] / 100);
                    else
                        $total -= $coupon['coupon_number'];
                }
            }

            try {
                DB::beginTransaction();

                // Insert to payments
                $payment = Payment::create([
                    'payment_method' => $data['payment_method'],
                    'payment_status' => 0,
                ]);

                $order_coupon = null;

                if ($coupons) {
                    $coupon_manager = Coupon::where('coupon_code', $coupons['0']['coupon_code'])->first();
                    $new_coupon_time = $coupon_manager->coupon_time - 1;
                    $coupon_manager->update([
                        'coupon_time' => $new_coupon_time
                    ]);
                    $order_coupon = $coupons['0']['coupon_code'];
                }

                // Insert to orders
                $order = Order::create([
                    'customer_id' => session()->get('customer_id'),
                    'shipping_id' => session()->get('shipping_id'),
                    'payment_id' => $payment->payment_id,
                    'order_total' => number_format($total),
                    'order_status' => 0,
                    'order_code' => $order_code,
                    'order_coupon' => $order_coupon,
                    'order_feeship' => session()->get('shipping_feeship'),
                    'order_code' => $order_code,
                    'order_date' => Carbon::now()->format('Y-m-d')
                ]);

                // Insert to order details

                foreach ($cart as $item) {
                    $order_details = OrderDetail::create([
                        'order_id' => $order->order_id,
                        'product_id' => $item['product_id'],
                        'product_sales_quantity' => $item['product_quantity'],
                        'order_code' => $order_code,
                    ]);
                }

                session()->forget(['cart', 'coupon']);
                session()->save();

                DB::commit();

                if ($payment->payment_method == 'ATM') {
                    echo "Thanh toán bằng ATM (tạm thời)";
                } else {
                    session()->flash('notification', 'Đơn hàng đã được đặt thành công! Hàng sẽ được giao đến bạn sớm nhất! Cảm ơn bạn');
                    return redirect()->back();
                }
            } catch (\Exception $exception) {
                DB::rollBack();
                dd($exception->getMessage());
                Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            }
        }
    }

    public function select_delivery(Request $request)
    {
        $data = $request->all();

        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'province') {
                if ($data['id'] < 10)
                    $province_id = '0' . $data['id'];
                else
                    $province_id = $data['id'];
                $districts = District::where('province_id', $province_id)->orderBy('district_id', 'asc')->get();
                $output = '<option value="">Chọn Quận/Huyện</option>';
                foreach ($districts as $district)
                    $output .= '<option value="' . $district->district_id . '">' . $district->district_name . '</option>';
            } else {
                if ($data['id'] < 10)
                    $district_id = '00' . $data['id'];
                elseif ($data['id'] < 100)
                    $district_id = '0' . $data['id'];
                else
                    $district_id = $data['id'];
                $wards = Ward::where('district_id', $district_id)->orderBy('ward_id', 'asc')->get();
                $output = '<option value="">Chọn Xã/Phường</option>';
                foreach ($wards as $ward)
                    $output .= '<option value="' . $ward->ward_id . '">' . $ward->ward_name . '</option>';
            }
        }
        echo $output;
    }

    public function calculate_delivery(Request $request)
    {
        $data = $request->all();
        $output = '';
        $provinces = Province::orderBy('province_id', 'asc')->get();

        if ($data['province_id']) {
            if ($data['province_id'] < 10)
                $province_id = '0' . $data['province_id'];
            else
                $province_id = $data['province_id'];

            if ($data['district_id'] < 10)
                $district_id = '00' . $data['district_id'];
            elseif ($data['district_id'] < 100)
                $district_id = '0' . $data['district_id'];
            else
                $district_id = $data['district_id'];

            if ($data['ward_id'] < 10)
                $ward_id = '0000' . $data['ward_id'];
            elseif ($data['ward_id'] < 100)
                $ward_id = '000' . $data['ward_id'];
            elseif ($data['ward_id'] < 1000)
                $ward_id = '00' . $data['ward_id'];
            elseif ($data['ward_id'] < 10000)
                $ward_id = '0' . $data['ward_id'];
            else
                $ward_id = $data['ward_id'];

            $feeship = Feeship::where('province_id', $province_id)->where('district_id', $district_id)->where('ward_id', $ward_id)->first();

            if ($feeship == null) {
                $feeship = Feeship::where('province_id', $province_id)->where('district_id', $district_id)->first();
                if ($feeship == null) {
                    $feeship = Feeship::where('province_id', $province_id)->first();
                }
            }

            if ($feeship == null)
                session()->put('feeship', 0);
            else
                session()->put('feeship', $feeship->fee_feeship);
            session()->save();
        }

        return view('pages.cart.show_cart_ajax', compact('provinces'));
    }
}
