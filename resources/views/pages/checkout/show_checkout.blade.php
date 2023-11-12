@extends('layout')
@section('content')


    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thanh toán giỏ hàng</li>
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
                <div class="col">
                 
                </div>
            </div>
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- billing-details-wrap start -->
                        <div class="billing-details-wrap">
                        <form action="" method="post">
                               @csrf
                                <h3 class="shoping-checkboxt-title">Thông tin gửi hàng</h3>
                                <div class="row">
                             
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Họ và tên<span class="required">*</span></label>
                                            <input type="text" value="" name="shipping_name" id="shpping_name" class="shipping_name">
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Điên thoại</label>
                                            <input type="text" value="" class="shipping_phone" name="shipping_phone">
                                        </p>
                                    </div>
                                
                                
                                    <div class="col-lg-12">
                                        <div class="single-form-row">
                                            <label>Thành phố <span class="required">*</span></label>
                                            <div class="nice-select wide">
                                                <select name="thanhpho" id="thanhpho" class=" choose thanhpho">
                                                    <option value="">Chọn tỉnh thành phố</option>
                                                    @foreach($thanhpho as $key => $city)
                                                    <option value="{{$city->matp}}">{{$city->ten_tp}}</option>
                                                    @endforeach                     
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-6">
                                        <div class="single-form-row">
                                            <label>Quận huyện <span class="required">*</span></label>
                                            <div class="nice-select wide">
                                                <select name="quanhuyen" id="quanhuyen" class="quanhuyen choose">
                                                    <option value="">Chọn quận huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="single-form-row">
                                            <label>Phường xã <span class="required">*</span></label>
                                            <div class="nice-select wide">
                                                <select name="phuongxa" id="phuongxa" class="phuongxa">
                                                    <option value="">Chọn quận huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ <span class="required">*</span></label>
                                            <input type="text" name="shipping_address" class="shipping_address">
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ email  <span class="required">*</span></label>
                                            <input type="text" name="shipping_email" class="shipping_email">
                                        </p>
                                    </div>


                    
                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Ghi chú đơn hàng</label>
                                            <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú thêm thông tin, như hàng dễ vỡ,..." class="checkout-mess" rows="2" cols="5"></textarea>
                                        </p>
                                    </div>
                                    <div class="order-button-payment ">
                                        {{-- <button type="button" class=" order-button-payment add_shipping">
                                            sss
                                        </button> --}}
                                       
                                    </div>       
                                    <h2><i class="fa fa-truck" aria-hidden="true"></i> Hinh thức vận chuyển</h2>
                                    <label id="chekout-box-2"><input type="radio" checked> Giao hàng tiêu chuẩn</label>
                                    <span>Miễn phí vận chuyển đối với đơn hàng từ 500.000đ giao tại nội thành Hà Nội, TP Hồ Chí Minh.
                                        Các địa chỉ khác: 30.000đ</span>                      
                                </div>
                            </div>
                    
           
                             
                                 
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Đơn hàng của bạn</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    @php
                                    $total = 0;
                                    $total_coupon = 0;
                                    $fee_ship = 30000;
                                    @endphp
                    
                                    @if(Session()->get('cart'))
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Session()->get('cart') as $key => $cart)
                                            @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                            $total += $subtotal;
                                            @endphp
                    
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$cart['product_name']}}
                                                    <strong class="product-quantity">x{{$cart['product_qty']}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{number_format($subtotal, 0, ',', '.')}} đ</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="shipping">
                                                <th>Vận chuyển</th>
                                                <td>
                                                    <ul>
                                                        <ul>
                                                            <li>
                                                                @if($total > 500000)
                                                                    {{$fee_ship = 0;}}
                                                                  
                                                                @else
                                                                
                                                                {{number_format($fee_ship, 0, ',', '.')}} đ
                                                                    
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @if(Session()->has('coupon'))
                                                @foreach(Session()->get('coupon') as $key => $cou)
                                                @if($cou['coupon_condition'] == 1)
                                                @php
                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                @endphp
                                                <tr>
                                                    <th>Mã giảm: {{$cou['coupon_number']}}%</th>
                                                    <td>
                                                        <span>{{number_format($total_coupon, 0, ',', '.') . ' VNĐ'}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tiền</th>
                                                    <td>
                                                        <strong> <span class="amount">{{number_format($total+$fee_ship-$total_coupon, 0, ',', '.') . ' VNĐ'}}</span></strong>
                                                    </td>
                                                </tr>
                                                
                                                
                                                @elseif($cou['coupon_condition'] == 2)
                                                @php
                                                $total_coupon = $total - $cou['coupon_number'];
                                                @endphp
                                                <tr>
                                                    <th>Mã giảm</th>
                                                    <td>
                                                        <span>{{number_format($cou['coupon_number'], 0, ',', '.') . ' VNĐ'}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tiền</th>
                                                    <td>
                                                        <strong> <span class="amount">{{number_format($total_coupon+$fee_ship, 0, ',', '.') . ' VNĐ'}}</span></strong>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            @else
                                                <tr class="order-total">
                                                    <th>Tổng hóa đơn</th>
                                                    <td>
                                                        <strong><span class="amount">{{number_format($total+$fee_ship, 0, ',', '.')}} đ</span></strong>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tfoot>
                                    </table>
                                    @endif
                                </div>
                                <!-- your-order-table end -->
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
                                        <h3>Thanh toán tiền mặt</h3>
                                        <div class="payment-content">
                                            <p>
                                                <input type="radio" id="payment_select_cash" name="payment_select" value="1">
                                                <label for="payment_select_cash">Thanh toán bằng tiền mặt khi đã nhận được hàng</label>
                                            </p>
                                        </div>
                                        <!-- ACCORDION END -->
                                        <!-- ACCORDION START -->
                                        <h3>Chuyển khoản ngân hàng</h3>
                                        <div class="payment-content">
                                            <p>
                                                <input type="radio" id="payment_select_transfer" name="payment_select" value="2">
                                                <label for="payment_select_transfer">Chuyển khoản ngân hàng</label>
                                            </p>
                                        </div>
                                        <!-- ACCORDION END -->
                                    
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="button" class="add_shipping" name="send_order" value="Đặt hàng" />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form> 
                
                    </div>
                </div>
            </div>
            <!-- checkout-details-wrapper end -->
        </div>
    </div>
    <!-- content-wraper end -->
@endsection