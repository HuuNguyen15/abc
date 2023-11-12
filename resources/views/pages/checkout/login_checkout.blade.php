@extends('layout')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Login Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4> Đăng nhập </h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4> Đăng ký </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{url('/login-customer')}}" method="post">
                                            @csrf
                                            <div class="login-input-box">
                                                <input type="text" name="customer_email" placeholder="Tài khoản hoặc email">
                                                <input type="password" name="customer_password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Ghi nhơ</label>
                                                    <a href="#">Quên mật khẩu?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{url('add-customer')}}" method="post">
                                            @csrf
                                            <div class="login-input-box">
                                                <input type="text" name="customer_name" placeholder="Họ và tên">
                                                <input type="password" name="customer_password" placeholder="Password">
                                                <input name="customer_email"  placeholder="Email" type="email">
                                                <input type="text" name="customer_phone" placeholder="Phone">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" type="submit"><span>Đăng ký</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection