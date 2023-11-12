<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;

session_start();


class HomeController extends Controller
{
    public function index(Request $request)
    {
        // seo
        $meta_desc = "HN68WATCH - thế giới đồng hồ trực tuyến, chuyên bán đồng hồ trang sức nam nữ, chất lượng cao";
        $meta_keywords = 'Đồng hồ hn68watch ,đồng hồ nam, đồng hồ nữ, đồng hồ replica, đồng hồ qua tay';
        $meta_title = 'HN68WATCH - thế giới đồng hồ trực tuyến, ';
        $url_canonical = $request->url();
        // end seo
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(5)->get();
        $all_product2 = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(5)->offset(5)->get();
        $slider = Slider::where('slider_status', 1)->orderBy('slider_id', 'DESC')->get();
        return view('pages.home')->with(compact('cate_product', 'brand_product', 'all_product', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'slider', 'all_product2'));
    }
    public function search(Request $request)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        $keywords = $request->keywords_submit;

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();
        return view('pages.product.search', ['cate_product' => $cate_product, 'brand_product' => $brand_product, 'search_product' => $search_product]);
    }


    public  function show_category_home(Request $required, $slug_category_product)
    {


        // end seo
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        foreach ($cate_product as $key => $cate) {
            $cate_count = DB::table('tbl_product')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_slug', $cate->category_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $cate->category_count = $cate_count;
        }
        foreach ($brand_product as $key => $brand) {
            $brand_count = DB::table('tbl_product')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->where('tbl_brand.brand_slug', $brand->brand_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $brand->brand_count = $brand_count;
        }

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')->where('tbl_category_product.category_slug', $slug_category_product)->get();
        if ($category_by_id->isEmpty()) {
            return redirect()->back();
        }
        foreach ($category_by_id as $key => $value) {
            $category_id = $value->category_id;
            $meta_desc = $value->category_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->category_name;
            $url_canonical = $required->url();
        }
        $cate_name = DB::table('tbl_category_product')->where('tbl_category_product.category_slug', $slug_category_product)->limit(1)->get();
        return view('pages.category.show_category')->with(compact('cate_product', 'brand_product', 'category_by_id', 'cate_name', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'cate_count'));
    }


    public  function show_brand_home(Request $required, $slug_brand_product)
    {
        // end seo
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        foreach ($cate_product as $key => $cate) {
            $cate_count = DB::table('tbl_product')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_slug', $cate->category_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $cate->category_count = $cate_count;
        }
        foreach ($brand_product as $key => $brand) {
            $brand_count = DB::table('tbl_product')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->where('tbl_brand.brand_slug', $brand->brand_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $brand->brand_count = $brand_count;
        }
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')->where('tbl_brand.brand_slug', $slug_brand_product)->get();
        foreach ($brand_by_id as $key => $value) {
            $brand_id = $value->brand_id;
            $meta_desc = $value->brand_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->brand_name;
            $url_canonical = $required->url();
        }
        foreach ($cate_product as $key => $cate) {
            $cate_count = DB::table('tbl_product')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_slug', $cate->category_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $cate->category_count = $cate_count;
        }
        foreach ($brand_product as $key => $brand) {
            $brand_count = DB::table('tbl_product')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->where('tbl_brand.brand_slug', $brand->brand_slug)
                ->count();

            // Thêm một thuộc tính 'product_count' vào đối tượng $cate
            $brand->brand_count = $brand_count;
        }
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug', $slug_brand_product)->limit(1)->get();
        return view('pages.brand.show_brand')->with(compact('cate_product', 'brand_product', 'brand_by_id', 'brand_name', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }

    public function error_page(Request $request)
    {
        $meta_desc = "";
        $meta_keywords = '';
        $meta_title = '404 ';
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        return view('errors.404', ['meta_desc' => $meta_desc, 'meta_keywords' => $meta_keywords, 'meta_title' => $meta_title, 'url_canonical' => $url_canonical], compact('cate_product', 'brand_product'));
    }
}
