@extends('layout')
@section('content')

<?php
$content = Cart::content();
?>
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thanh toán </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
          
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <div class="row">
                  
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Đơn hàng của bạn</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phảm</th>
                                                <th class="product-total">Tổng </th>
                                            </tr>							
                                        </thead>
                                        <tbody>
                                            @foreach($content as $v_content)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$v_content->name}} <strong class="product-quantity"> x {{$v_content->qty}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{number_format($v_content->price*$v_content->qty).' '.'VND'}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                        <tfoot>
                                         
                                            <tr class="shipping">
                                                <th>Vận chuyển</th>
                                                <td>
                                                    <ul>
                                                      
                                                        <li>
                                                           
                                                            <label>Free  <label>
                                                        </li>
                                                       
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng hóa đơn</th>
                                                <td><strong><span class="amount">{{Cart::Total(0,',','.').''.'VNĐ'}}</span></strong>
                                                </td>
                                            </tr>								
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- your-order-table end -->
                                
                                <!-- your-order-wrap end -->
                                <div class="payment-method">
                                    <form action="{{url('/order-place')}}" method="POST">
                                        @csrf
                                    <h4>Hình thức thanh toán</h4>
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
                                        <h3>Thanh toán tiền mặt</h3>
                                        
                                        <div class="payment-content">
                                            <label for="">Nhận tiền mặt
                                                <input type="checkbox" name="payment_option" value="1">
                                            </label>
                                        </div>
                                        <!-- ACCORDION END -->	
                                        <!-- ACCORDION START -->
                                        <h3>Trả bằng thể ATM nội địa</h3>
                                        <div class="payment-content">
                                            <label for="">Thẻ ATM
                                                <input type="checkbox" name="payment_option" value="2">
                                            </label>
                                        </div>
                                        <!-- ACCORDION END -->	
                                        <!-- ACCORDION START -->
                                        <h3>Trả bằng thẻ ghi nợ <img src="assets/images/icon/4.png" alt="" /></h3>
                                        <div class="payment-content">
                                            <label for="">Thẻ ghi nợ
                                                <input type="checkbox" name="payment_option" value="3">
                                            </label>
                                        </div>
                                        <!-- ACCORDION END -->									
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Thanh toán" name="send_order_place" >
                                    </div>
                                </form>
                                </div>
                                <!-- your-order-wrapper start -->
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-details-wrapper end -->
        </div>
    </div>
    <!-- content-wraper end -->
@endsection