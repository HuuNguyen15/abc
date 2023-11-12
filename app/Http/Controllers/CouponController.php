<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();
class CouponController extends Controller
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

    public function show_coupon()
    {
        $this->AuthLogin();
        $all_coupon = Coupon::orderBy('coupon_id', 'DESC')->get();
        return view('admin.coupon.show_coupon', ['all_coupon' => $all_coupon]);
    }
    public function add_coupon_code()
    {
        $this->AuthLogin();
        return view('admin.coupon.add_coupon');
    }


    public function save_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        return redirect('show-coupon')->with('message', 'Thêm mã giảm giá thành công');
    }

    public function delete_coupon_code($coupon_id)
    {
        $this->AuthLogin();
        Coupon::find($coupon_id)->delete();
        return redirect('show-coupon')->with('message', 'Xóa mã giảm giá thành công');
    }
}
