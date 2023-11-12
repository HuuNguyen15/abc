<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RuleNhapDM;

session_start();

class CategoryProduct extends Controller
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
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('admin.category.add_category_product');
    }

    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        return view('admin.category.all_category_product', ['all_category_product' => $all_category_product]);
    }


    public function save_category_product(RuleNhapDM $request)

    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_slug'] = $request->slug_category_product;
        $data['meta_keywords'] = $request->category_product_keywords;
        DB::table('tbl_category_product')->insert($data);
        request()->session()->put('message', 'Thêm danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        request()->session()->put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    }

    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        request()->session()->put('message', 'Ẩn danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    }

    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        return view('admin.category.edit_category_product', ['edit_category_product' => $edit_category_product]);
    }

    public function update_category_product(RuleNhapDM $request, $category_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_slug'] = $request->slug_category_product;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        request()->session()->put('message', 'Cập nhật danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    }

    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        request()->session()->put('message', 'Xóa danh mục sản phẩm thành công');
        return redirect('/all-category-product');
    }
    public function export_csv()
    {
    }
    public function import_csv()
    {
    }
}
