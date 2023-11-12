<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Http\Requests\RuleNhapTH;

session_start();

class BrandProduct extends Controller
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

    public function add_brand_product()
    {
        $this->AuthLogin();
        return view('admin.brand.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = Brand::orderBy('brand_id', 'desc')->get();
        return view('admin.brand.all_brand_product', ['all_brand_product' => $all_brand_product]);
    }


    public function save_brand_product(RuleNhapTH $request)

    {
        $this->AuthLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->brand_slug = $data['slug_brand_product'];
        $brand->meta_keywords = $data['brand_product_keywords'];
        $brand->save();
        request()->session()->put('message', 'Thêm danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 1]);
        request()->session()->put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 0]);
        request()->session()->put('message', 'Ẩn danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->get();
        return view('admin.brand.edit_brand_product', ['edit_brand_product' => $edit_brand_product]);
    }

    public function update_brand_product(RuleNhapTH $request, $brand_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_slug'] = $request->slug_brand_product;
        $data['meta_keywords'] = $request->brand_product_keywords;
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update($data);
        request()->session()->put('message', 'Cập nhật danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->delete();
        request()->session()->put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect('/all-brand-product');
    }

    // end admin page
    // start home page


}
