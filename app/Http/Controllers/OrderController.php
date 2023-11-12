<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Thanhpho;
use App\Models\Quanhuyen;
use App\Models\Xaphuong;
use App\Models\Order;
use App\Models\OrderDetails;;


use PDF;


use App\Models\Product;
use Illuminate\Support\Facades\App;

session_start();

class OrderController extends Controller
{
    public function update_order(Request $request)
    {
        // update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        // 
        if ($order->order_status == 2) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        } elseif ($order->order_status != 2 && $order->order_status != 3) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $product_quantity + $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }

        return redirect()->back()->with('message', 'Cập nhật trạng thái đơn hàng thành công');
    }
    public function manage_order()
    {
        $all_order = Order::orderby('created_at', 'desc')->get();
        return view('admin.order.manage_order', compact('all_order'));
    }

    public function view_order($order_code)
    {

        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        $all_order = Order::where('order_code', $order_code)->get();
        foreach ($all_order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();

        $xa = Xaphuong::where('xaid', $shipping->shipping_xaid)->first();
        $phuong = Quanhuyen::where('maqh', $shipping->shipping_maqh)->first();
        $tp = Thanhpho::where('matp', $shipping->shipping_matp)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();
        foreach ($order_details_product as $key => $ord_cp) {
            $product_coupon = $ord_cp->product_coupon;
        }

        if ($product_coupon != 0) {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        return view('admin.order.view_order', compact('order_details', 'all_order', 'customer', 'shipping', 'xa', 'phuong', 'tp', 'coupon_condition', 'coupon_number', 'order_status'));
    }
    public function update_qty(Request $request)
    {
        $data = $request->all();
        $order_details = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
        return redirect()->back()->with('message', 'Cập nhật số lượng sản phẩm thành công');
    }

    // in đơn hàng :
    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
        $order_details = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
        $all_order = Order::where('order_code', $checkout_code)->get();
        foreach ($all_order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $xa = Xaphuong::where('xaid', $shipping->shipping_xaid)->first();
        $phuong = Quanhuyen::where('maqh', $shipping->shipping_maqh)->first();
        $tp = Thanhpho::where('matp', $shipping->shipping_matp)->first();
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $shippingPhone = $shipping->shipping_phone;
        $order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
        foreach ($order_details_product as $key => $ord_cp) {
            $product_coupon = $ord_cp->product_coupon;
        }

        if ($product_coupon != 0) {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        // Check if the phone number is not empty and has more than 4 characters
        if (!empty($shippingPhone) && strlen($shippingPhone) > 4) {
            // Replace the initial digits with asterisks
            $hiddenPhone = str_repeat('*', strlen($shippingPhone) - 4) . substr($shippingPhone, -4);
        } else {
            $hiddenPhone = $shippingPhone; // Use the original phone if it's empty or has 4 or fewer characters
        }


        $order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
        $output = '';
        $output .= ' 
        <style>
            body {
                font-family: DejaVu Sans;
                margin: 0;
                padding: 0;
            }

            .invoice {
                width: 80%;
                margin: 20px auto;
                border: 1px solid #ddd;
                border-radius: 8px;
                overflow: hidden;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px;
                background-color: #f2f2f2;
            }

            .logo {
                width: 100px; /* Adjust the width as needed */
                height: auto;
            }

            .total {
                text-align: right;
                padding: 10px;
                background-color: #f2f2f2;
                font-weight: bold;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

        </style>
    </head>
    <body>

    <div class="invoice">
        <div class="header">
            <div class="logo">
                <h2>HN68WATCH</h2>
            </div>
         
        </div>

        <div>
           <p class="">Thông tin người nhận</p>
            <p>Tên: ' . $shipping->shipping_name . '</p>
            <p>Email: ' . $customer->customer_email . '</p>
            <p>Điện thoại: ' . $hiddenPhone . '</p>
            <p>Địa chỉ: ' . $shipping->shipping_address . ', ' . $xa->ten_xaphuong . ', ' . $phuong->ten_quanhuyen . ', ' . $tp->ten_tp . '</p>
            <p>Ghi chú: ' . $shipping->shipping_notes . '</p>
            <!-- Add more customer information as needed -->
            

            <table>
                <thead>
                    <tr>
                        <th>Tên sản phảm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>';

        $total = 0;

        foreach ($order_details as $key => $order_detail) {
            $subtotal = $order_detail->product->product_price * $order_detail->product_sales_quantity;
            $total += $subtotal;
            if ($order_detail->product_coupon != 0) {
                $product_coupon = $order_detail->product_coupon;
            } else {
                $product_coupon = 0;
            }


            $output .= '
                    <tr>
                        <td>' . $order_detail->product->product_name . '</td>
                        <td>' . $order_detail->product->product_quantity . '</td>
                        <td>$' . number_format($order_detail->product->product_price, 0, ',', ',') . 'đ'  . '</td>
                        <td>$' . number_format($subtotal, 0, ',', ',') . 'đ' . '</td>
                    </tr>';
        }
        $feeship = 0;
        if ($total > 500000) {
            $feeship = 0;
        } else {

            $feeship = 30000;
        }
        if ($coupon_condition == 1) {
            $total_after_coupon = ($total * $coupon_number) / 100;
            $total_coupon = $total - $total_after_coupon;
        } else {
            $total_coupon = $total - $coupon_number;
        }
        $output .= '
                    <tr>
                    <td colspan="3">Phí vận chuyển</td>
                    <td>$' . number_format($feeship, 0, ',', ',') . 'đ' . '</td>
                    </tr>
                       
                    <tr>
                    <td colspan="3">Giảm</td>
                    <td>$' . number_format($coupon_number, 0, ',', ',') . 'đ' . '</td>
                    </tr>
                    <tr>
                        <tr>
                        
                        <td colspan="3">Tổng hóa đơn</td>
                        <td>$' . number_format($total_coupon + $feeship, 0, ',', ',') . 'đ' . '</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    </body>';

        return $output;
    }
}
