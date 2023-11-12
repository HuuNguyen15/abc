<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RuleNhapSP;

session_start();

class ProductController extends Controller
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

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        return view('admin.product.add_product', ['cate_product' => $cate_product, 'brand_product' => $brand_product]);
    }

    public function all_product()
    {


        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderby('tbl_product.product_id', 'desc')->get();
        return view('admin.product.all_product', ['all_product' => $all_product]);
    }


    public function save_product(RuleNhapSP $request)

    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['slug'] = $request->slug_product;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_status'] = $request->product_status;
        $data['meta_keywords'] = $request->product_keywords;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(1, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            request()->session()->put('message', 'Thêm sản phảm thành công');
            return redirect('/all-product');
        }
        $data['product_image'] = '';

        DB::table('tbl_product')->insert($data);
        request()->session()->put('message', 'Thêm sản phảm thành công');
        return redirect('/all-product');
    }

    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        request()->session()->put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return redirect('/all-product');
    }

    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        request()->session()->put('message', 'Ẩn danh mục sản phẩm thành công');
        return redirect('/all-product');
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        return view('admin.product.edit_product', ['edit_product' => $edit_product], ['cate_product' => $cate_product, 'brand_product' => $brand_product]);
    }

    public function update_product(RuleNhapSP $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['slug'] = $request->slug_product;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_status'] = $request->product_status;
        $data['meta_keywords'] = $request->product_keywords;
        $get_image  = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(1, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            request()->session()->put('message', 'Cập nhật sản phảm thành công');
            return redirect('/all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        request()->session()->put('message', 'Cập nhật sản phảm thành công');
        return redirect('/all-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        request()->session()->put('message', 'Xóa sản phẩm thành công');
        return redirect('/all-product');
    }

    // end admin page
    // start client page

    public function details_product($slug, Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.slug', $slug)
            ->get();

        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $details_product[0]->category_id)
            ->where('tbl_product.slug', '!=', $slug)
            ->get();

        $meta_desc = $details_product[0]->product_desc;
        $meta_keywords = $details_product[0]->meta_keywords;
        $meta_title = $details_product[0]->product_name;
        $url_canonical = $request->url();

        return view('pages.product.show_detail', [
            'cate_product' => $cate_product,
            'brand_product' => $brand_product,
            'details_product' => $details_product,
            'related_product' => $related_product,
            'meta_desc' => $meta_desc,
            'meta_keywords' => $meta_keywords,
            'meta_title' => $meta_title,
            'url_canonical' => $url_canonical,
        ]);
    }
}
