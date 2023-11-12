<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social;
use App\Models\Login;

session_start();
class AdminController extends Controller
{
    // public function login_facebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }


    // public function callback_facebook()
    // {
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = Social::where('provider_user_id', $provider->getId())->first();
    //     if ($account) {
    //         $account_name = Login::where('admin_id', $account->user)->first();
    //         request()->session()->put('admin_name', $account_name->admin_name);
    //         request()->session()->put('admin_id', $account_name->admin_id);
    //         return redirect('/dashboard');
    //     } else {

    //         $taikhoan = new Social([
    //             'provider_user_id' => $provider->getId(),
    //             'provider' => 'facebook',

    //         ]);
    //         $orang = Login::where('admin_email', $provider->getEmail())->first();
    //         if (!$orang) {
    //             $orang = Login::created([
    //                 'admin_name' => $provider->getName(),
    //                 'admin_email' => $provider->getEmail(),
    //                 'admin_password' => '',
    //                 'admin_phone' => '',
    //             ]);
    //         }
    //     }
    //     $taikhoan->login()->associate($orang);
    //     $taikhoan->save();
    //     $account_name = Login::where('admin_id', $orang->admin_id)->first();
    //     request()->session()->put('admin_name', $account_name->admin_name);
    //     request()->session()->put('admin_id', $account_name->admin_id);
    //     return redirect('/dashboard');
    // }

    public function AuthLogin()
    {
        $admin_id = request()->session()->get('admin_id');
        if ($admin_id) {
            return redirect('/dashboard');
        } else {
            return redirect('/admin')->send();
        }
    }



    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where(['admin_email' => $admin_email, 'admin_password' => $admin_password])->first();
        if ($login) {
            request()->session()->put('admin_name', $login->admin_name);
            request()->session()->put('admin_id', $login->admin_id);
            return redirect('/dashboard');
        } else {
            request()->session()->put('message', 'Mật khẩu hoặc tài khoản bị sai, làm ơn nhập lại');
            return redirect('/admin');
        }






        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);
        // $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        // if ($result) {
        //     request()->session()->put('admin_name', $result->admin_name);
        //     request()->session()->put('admin_id', $result->admin_id);
        //     return redirect('/dashboard');
        // } else {
        //     request()->session()->put('message', 'Mật khẩu hoặc tài khoản bị sai, làm ơn nhập lại');
        //     return redirect('/admin');
        // }
    }

    public function logout()
    {
        $this->AuthLogin();
        request()->session()->put('admin_name', null);
        request()->session()->put('admin_id', null);
        return redirect('/admin');
    }
}