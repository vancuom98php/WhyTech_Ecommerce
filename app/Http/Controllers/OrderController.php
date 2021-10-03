<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Statistical;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view('admin.order.manage_order', compact('orders'));
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
        //
    }

    /**
     * Show Order Details
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $order = Order::where('order_code', $code)->first();
        $coupon = Coupon::where('coupon_code', $order->order_coupon)->first();

        if ($coupon) {
            if ($coupon->coupon_condition == 1)
                $coupon_type = '- ' . $coupon->coupon_number . '%';
            else $coupon_type = '- ' . number_format($coupon->coupon_number) . ' VNĐ';
        } else $coupon_type = '';

        return view('admin.order.show_order', compact('order', 'coupon_type'));
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
     * @param  int  $code
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
     * @param  int  $code
     * @return \Illuminate\Http\Response
     */
    public function delete($code)
    {
        $order = Order::where('order_code', $code)->delete();

        session()->flash('notification', 'Xóa đơn hàng thành công');
        return redirect()->back();
    }

    /**
     * Print specified order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($code));

        return $pdf->stream();
    }

    public function print_order_convert($code)
    {
        $order = Order::where('order_code', $code)->first();

        $coupon = Coupon::where('coupon_code', $order->order_coupon)->first();

        if ($coupon) {
            if ($coupon->coupon_condition == 1)
                $coupon_type = '- ' . $coupon->coupon_number . '%';
            else $coupon_type = '- ' . number_format($coupon->coupon_number) . ' VNĐ';
        } else $coupon_type = '';

        $total = 0;
        $coupon = '';

        if ($order->order_coupon)
            $coupon .= $order->order_coupon;
        else
            $coupon .= 'Không';

        $output = '';

        $output .= '<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
            width: 100%;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h2><center>CỬA HÀNG THIẾT BỊ GIẢI TRÍ - CHƠI GAME WHYTECH</center></h2>
		<p>THÔNG TIN KHÁCH HÀNG</p>
		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên khách đặt</th>
		<th>Số điện thoại</th>
		<th>Email</th>
		<th>Hình thức thanh toán</th>
		<th>Số tiền còn nợ</th>
		</tr>
		</thead>
		<tbody>';

        $output .= '		
		<tr>
		<td>' . optional($order->customer)->customer_name . '</td>
		<td>' . optional($order->customer)->customer_phone . '</td>
		<td>' . optional($order->customer)->customer_email . '</td>
		<td>' . optional($order->payment)->payment_method . '</td>
		<td>' . $order->order_total . ' VNĐ</td>
		</tr>';


        $output .= '				
		</tbody>

		</table>

		<p>THÔNG TIN VẬN CHUYỂN</p>
		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên người nhận</th>
		<th>Địa chỉ</th>
		<th>Sđt</th>
		<th>Email</th>
		<th>Ghi chú</th>
		</tr>
		</thead>
		<tbody>';

        $output .= '		
		<tr>
		<td>' . optional($order->shipping)->shipping_name . '</td>
		<td>' . optional($order->shipping)->shipping_address . '</td>
		<td>' . optional($order->shipping)->shipping_phone . '</td>
		<td>' . optional($order->shipping)->shipping_email . '</td>
		<td>' . optional($order->shipping)->shipping_notes . '</td>
		</tr>';


        $output .= '				
		</tbody>

		</table>

		<p>CHI TIẾT ĐƠN HÀNG</p>
		<table class="table-styling">
		<thead>
		<tr>
		<th>Tên sản phẩm</th>
		<th>Giá sản phẩm</th>
		<th>Số lượng</th>
		<th>Tổng tiền</th>
		</tr>
		</thead>
		<tbody>';

        foreach ($order->order_details as $order_details) {
            $total += $order_details->product_sales_quantity * optional($order_details->product)->product_price;
            $output .= '		
			<tr>
			<td>' . optional($order_details->product)->product_name . '</td>
			<td>' . number_format(optional($order_details->product)->product_price) . ' VNĐ</td>
			<td>' . $order_details->product_sales_quantity . '</td>
			<td>' . number_format($order_details->product_sales_quantity * optional($order_details->product)->product_price) . ' VNĐ</td>
			</tr>';
        }

        $output .= '<tr>
		<td colspan="4">
		<p>Mã giảm giá: ' . $coupon . ' (' . $coupon_type . ')</p>
		<p>Phí vận chuyển: ' . number_format($order->order_feeship) . ' VNĐ</p>
		<p>Tổng giá trị đơn hàng: ' . number_format($total) . ' VNĐ</p>
		<p>Số tiền phải trả: ' . $order->order_total . ' VNĐ</p>
		</td>
		</tr>';

        $output .= '				
		</tbody>

		</table>

		<p>Ký tên</p>
		<table>
		<thead>
		<tr>
		<th width="200px">Người lập phiếu</th>
		<th width="800px">Người nhận</th>

		</tr>
		</thead>
		<tbody>';

        $output .= '				
		</tbody>

		</table>
		';

        return $output;
    }

    public function handle(Request $request)
    {
        $data = $request->all();

        $order = Order::find($data['order_id']);

        $order->update([
            'order_status' => $data['order_status'],
        ]);

        if ($data['order_status'] == 1) {
            $total_order = 1;
            $sales = 0;
            $profit = 0;
            $quantity = 0;

            foreach ($order->order_details as $order_details) {
                $product = Product::find($order_details->product_id);

                $newQuantity = $product->product_quantity - $order_details->product_sales_quantity;
                $newSold = $product->product_sold + $order_details->product_sales_quantity;

                $product->update([
                    'product_quantity' => $newQuantity,
                    'product_sold' => $newSold,
                ]);

                $quantity += $order_details->product_sales_quantity;
                $sales += $order_details->product_sales_quantity * $product->product_price;
                $profit += $sales - $product->product_cost * $order_details->product_sales_quantity;
            }

            // Update Statistical after handle order
            $statistical = Statistical::where('order_date', $order->order_date)->first();

            if ($statistical) {
                $statisticalDataUpdate = [
                    'sales' => $sales + $statistical->sales,
                    'profit' => $profit + $statistical->profit,
                    'quantity' => $quantity + $statistical->quantity,
                    'total_order' => $total_order + $statistical->total_order
                ];
                $statistical->update($statisticalDataUpdate);
            } else {
                $newStatistical = Statistical::create([
                    'order_date' => $order->order_date,
                    'sales' => $sales,
                    'profit' => $profit,
                    'quantity' => $quantity,
                    'total_order' => $total_order
                ]);
            }
        }

        if ($data['order_status'] == 2 && $data['order_status_before'] == 1) {
            $total_order = 1;
            $sales = 0;
            $profit = 0;
            $quantity = 0;

            foreach ($order->order_details as $order_details) {
                $product = Product::find($order_details->product_id);

                $newQuantity = $product->product_quantity + $order_details->product_sales_quantity;
                $newSold = $product->product_sold - $order_details->product_sales_quantity;

                $quantity += $order_details->product_sales_quantity;
                $sales += $order_details->product_sales_quantity * $product->product_price;
                $profit += $sales - $product->product_cost * $order_details->product_sales_quantity;

                $product->update([
                    'product_quantity' => $newQuantity,
                    'product_sold' => $newSold,
                ]);

                $statistical = Statistical::where('order_date', $order->order_date)->first();

                $statisticalDataUpdate = [
                    'sales' => $statistical->sales - $sales,
                    'profit' =>  $statistical->profit - $profit,
                    'quantity' => $statistical->quantity - $quantity,
                    'total_order' =>  $statistical->total_order - $total_order
                ];
                $statistical->update($statisticalDataUpdate);
            }
        }
    }
}
