<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

session_start();

class CartController extends Controller
{
    public function gio_hang(Request $request)
    {
        $meta_desc = "GIỎ HÀNG CỦA BẠN";
        $meta_keywords = "GIỎ HÀNG CỦA BẠN";
        $meta_title = "GIỎ HÀNG ";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('pages.cart.show_cart', [
            'cate_product' => $cate_product, 'brand_product' => $brand_product, 'meta_desc' => $meta_desc, 'meta_keywords' => $meta_keywords, 'meta_title' => $meta_title, 'url_canonical' => $url_canonical
        ]);
    }

    public function add_cart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart', []);
        $if_available = false;

        foreach ($cart as $key => $val) {
            if ($val['product_id'] == $data['cart_product_id']) {
                // Sản phẩm đã tồn tại trong giỏ hàng
                $if_available = true;

                // Kiểm tra số lượng tồn kho
                $remaining_quantity = $val['product_quantity'] - $val['product_qty'];
                if ($data['cart_product_qty'] > $remaining_quantity) {
                    // Nếu số lượng trong giỏ hàng vượt quá số lượng tồn kho, thông báo lỗi
                    return response()->json(['error' => 'Số lượng sản phẩm vượt quá số lượng tồn kho']);
                }

                // Cập nhật số lượng của sản phẩm
                $cart[$key]['product_qty'] += $data['cart_product_qty'];
                break; // Dừng vòng lặp vì đã tìm thấy sản phẩm trong giỏ hàng
            }
        }

        if (!$if_available) {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty'],
                'product_quantity' => $data['cart_product_quantity'],
            ];
        }

        Session::put('cart', $cart); // Lưu giỏ hàng vào phiên
        return response()->json(['success' => 'Thêm vào giỏ hàng thành công']);
    }




    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart', []);

        if (!empty($data['cart_qty'])) {
            foreach ($data['cart_qty'] as $session_id => $qty) {
                foreach ($cart as $key => $item) {
                    if ($item['session_id'] == $session_id) {
                        // Kiểm tra số lượng tồn kho
                        if ($qty > $item['product_quantity']) {
                            // Nếu số lượng cập nhật lớn hơn số lượng tồn kho, giới hạn lại
                            $qty = $item['product_quantity'];
                            // Trả về JSON thông báo lỗi và số lượng thực tế
                            return response()->json(['message' => 'Số lượng cập nhật vượt quá tồn kho', 'quantity' => $qty], 422);
                        }

                        $cart[$key]['product_qty'] = $qty;
                    }
                }
            }

            Session::put('cart', $cart);
            // Trả về JSON thông báo thành công và số lượng cập nhật thành công
            return response()->json(['message' => 'Cập nhật giỏ hàng thành công', 'quantity' => $qty]);
        }
    }








    public function delete_cart($session_id)
    {
        $cart = Session::get('cart', []);
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return Redirect::to('/gio-hang')->with('message', 'Xóa sản phẩm thành công');
        } else {
            return Redirect::to('/gio-hang')->with('message', 'Xóa sản phẩm không thành công');
        }
    }

    //ma giam gia 
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();

        if (!$coupon) {
            return redirect()->back()->with('error1', 'Mã giảm giá không tồn tại');
        }

        $count_coupon = count(Session::get('coupon', []));

        if ($count_coupon > 0) {
            $is_available = 0;
            if ($is_available == 0) {
                $cou[] = [
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,
                    'coupon_name' => $coupon->coupon_name,
                ];
                Session::put('coupon', $cou);
            }
        } else {
            $cou[] = [
                'coupon_code' => $coupon->coupon_code,
                'coupon_condition' => $coupon->coupon_condition,
                'coupon_number' => $coupon->coupon_number,
            ];
            Session::put('coupon', $cou);
        }

        Session::save();
        return redirect()->back()->with('message1', 'Áp dụng mã giảm giá thành công');
    }
}
