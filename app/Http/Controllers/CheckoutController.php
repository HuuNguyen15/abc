<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Thanhpho;
use App\Models\Quanhuyen;
use App\Models\Xaphuong;
use App\Models\Order;
use App\Models\OrderDetails;

session_start();

class CheckoutController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = request()->session()->get('admin_id');
        if ($admin_id) {
            return redirect('/dashboard');
        } else {
            return redirect('/admin')->send();
        }
    }
    public function login_checkout(Request $request)
    {
        $meta_desc = "ĐĂNG NHẬP";
        $meta_keywords = "ĐĂNG NHẬP";
        $meta_title = "ĐĂNG NHẬP";
        $url_canonical = request()->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.login_checkout', ['cate_product' => $cate_product, 'brand_product' => $brand_product, 'meta_desc' => $meta_desc, 'meta_keywords' => $meta_keywords, 'meta_title' => $meta_title, 'url_canonical' => $url_canonical]);
    }

    public function add_customer(Request $request)
    {


        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;
        $insert_customer = DB::table('tbl_customer')->insertGetId($data);
        Request()->session()->put('customer_id', $insert_customer);
        Request()->session()->put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(Request $request)
    {
        $meta_desc = "THANH TOÁN";
        $meta_keywords = "THANH TOÁN";
        $meta_title = "THANH TOÁN";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $thanhpho = Thanhpho::orderby('matp', 'ASC')->get();

        return  view('pages.checkout.show_checkout', [
            'cate_product' => $cate_product,
            'brand_product' => $brand_product,
            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
            'thanhpho' => $thanhpho,


        ]);
    }
    public function select_delivery_shipping(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "thanhpho") {
                $select_quanhuyen = Quanhuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output = '<option >Chọn Quận/Huyện</option>';
                foreach ($select_quanhuyen as $key => $qh) {
                    $output .= '<option value="' . $qh->maqh . '">' . $qh->ten_quanhuyen . '</option>';
                }
            } else {
                $select_phuongxa = Xaphuong::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output = '<option value="">Chọn Xã/Phường</option>';
                foreach ($select_phuongxa as $key => $px) {
                    $output .= '<option value="' . $px->xaid . '">' . $px->ten_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }

    public function add_shipping(Request $request)
    {
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_matp = $data['thanhpho'];
        $shipping->shipping_maqh = $data['quanhuyen'];
        $shipping->shipping_xaid = $data['phuongxa'];

        if (isset($data['payment_option'])) {
            $shipping->shipping_method = $data['payment_option'];
        } else {
            $shipping->shipping_method = 1;
        }
        $shipping->save();

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $shipping_id = $shipping->shipping_id;  // lấy id của shipping vừa thêm vào
        $order = new Order();
        $order->customer_id = Session()->get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->created_at = date('Y-m-d H:i:s');
        $order->save();

        if (session()->has('cart')) {
            foreach (Session()->get('cart') as $key => $cart) {
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                if (($cart['product_price'] * $cart['product_qty']) > 500000) {
                    $order_details->product_feeship = 0;
                } else {
                    $order_details->product_feeship = 30000;
                }
                if (session()->has('coupon')) {
                    foreach (Session()->get('coupon') as $key => $cou) {
                        $order_details->product_coupon = $cou['coupon_code'];
                    }
                };

                $order_details->save();
            }
        }
        Session()->forget('cart');
        Session()->forget('coupon');
    }





    public function payment()
    {
        $meta_desc = "THANH TOÁN";
        $meta_keywords = "THANH TOÁN";
        $meta_title = "THANH TOÁN";
        $url_canonical = request()->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.payment', ['cate_product' => $cate_product, 'brand_product' => $brand_product, 'meta_desc' => $meta_desc, 'meta_keywords' => $meta_keywords, 'meta_title' => $meta_title, 'url_canonical' => $url_canonical]);
    }

    public function logout_checkout()
    {
        Request()->session()->flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->customer_email;
        $password = md5($request->customer_password);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();
        if ($result) {
            Request()->session()->put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            Request()->session()->put('message', 'Mật khẩu hoặc tài khoản không đúng');
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request)
    {

        //insert vào payment

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert vào order
        $order_data = array();
        $order_data['customer_id'] = Request()->session()->get('customer_id');
        $order_data['shipping_id'] = Request()->session()->get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert vào order_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if ($data['payment_method'] == 1) {
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
            return view('pages.checkout.handcash', ['cate_product' => $cate_product, 'brand_product' => $brand_product, 'meta_desc' => 'Thanh toán khi nhận hàng', 'meta_keywords' => 'Thanh toán khi nhận hàng', 'meta_title' => 'Thanh toán khi nhận hàng', 'url_canonical' => request()->url()]);
        } elseif ($data['payment_method'] == 2) {
            echo 'Thanh toán bằng ATM';
        } else {
            echo 'Thẻ ghi nợ';
        }
    }

    //admin
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->select('tbl_order.*', 'tbl_customer.customer_name')
            ->orderby('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.order.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.order.manage_order', $manager_order);
    }

    public function view_order($orderId)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
            ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_details.*')
            ->first();
        $manager_order_by_id = view('admin.order.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.order.view_order', $manager_order_by_id);
    }
}
