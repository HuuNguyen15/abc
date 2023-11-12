<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class SlideController extends Controller
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
    public function manager_slider()
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->get();
        return view('admin.slider.list_slider', compact('slider'));
    }

    public function add_slider()
    {
        return view('admin.slider.add_slider');
    }
    public function insert_slider(Request $request)
    {

        $this->AuthLogin();
        $data = $request->all();
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(1, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->slider_status = $data['slider_status'];
            $slider->slider_image = $new_image;
            $slider->save();

            request()->session()->put('message', 'Thêm sản phảm thành công');
            return redirect('/add-slider');
        } else {
            request()->session()->put('message', 'làm ơn thêm hình ảnh');
            return redirect('/add-slider');
        }
    }
    public function unactive_slider($slider_id)
    {

        Slider::where('slider_id', $slider_id)->update(['slider_status' => 1]);
        request()->session()->put('message', 'Ẩn slider thành công');
        return redirect('/manager-slider');
    }
    public function active_slider($slider_id)
    {

        Slider::where('slider_id', $slider_id)->update(['slider_status' => 0]);
        request()->session()->put('message', 'Hiển thị slider thành công');
        return redirect('/manager-slider');
    }
    public function delete_slider($slider_id)
    {
        $this->AuthLogin();
        $slider = Slider::find($slider_id);
        $slider->delete();
        request()->session()->put('message', 'Xóa slider thành công');
        return redirect('/manager-slider');
    }
}
