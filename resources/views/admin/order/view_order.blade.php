@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Liệt kê chi tiết đơn hàng
            </h3>
            <?php
            $message = session()->get('message');
               if ($message) {
                   echo '<div class="alert alert-success">' . $message . '</div>';
                   session()->forget('message');
               }
               ?>
           </div>
            <div class="row m-t-30">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Thông tin khách hàng</h3>
                       
                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>                              
                                        <td>Tên</td>
                                        <td>Phone</td> 
                                        <td>Email</td>
                                    </tr>
                                </thead>
                                <tbody>     
                                    <tr>
                                
                                        <td>
                                            <div class="table-data__info">
                                                <h6>{{$customer->customer_name}}</h6>
                                               
                                            </div>
                                        </td>
                                        <td>
                                            <span class="role admin">{{$customer->customer_phone}}</span>
                                        </td>
                                        <td>
                                            <span class="email">{{$customer->customer_email}}</span>
                                        </td>
                                     
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                    <!-- END USER DATA-->
                </div>
             
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data ">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Thông tin vận chuyển</h3>
                       
                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>                              
                                        <td>Tên </td>
                                        <td>Phone</td>
                                        <td>Địa chỉ</td>
                                        <td>Email</td> 
                                        <td>Ghi chú</td>
                                        <td>Hình thức thanh toán</td>
                                  
                                    </tr>
                                </thead>
                                <tbody>     
                                    <tr>
                                
                                        <td>
                                            <div class="table-data__info">
                                                <h6>{{$shipping->shipping_name}}</h6>
                                               
                                            </div>
                                        </td>
                                        <td>
                                            <span class="role admin">{{$shipping->shipping_phone}}</span>
                                        </td>
                                        <td>
                                            <span class="email">
                                                {{$shipping->shipping_address}},
                                                {{$xa->ten_xaphuong}}
                                                {{$phuong->ten_quanhuyen}},{{$tp->ten_tp}},</span>
                                        </td>
                                        <td>
                                            <span class="email ">{{$shipping->shipping_email}}</span>
                                        </td>
                                        <td>
                                            <span class="email">{{$shipping->shipping_notes}}</span>
                                        </td>
                                        <td>
                                            @if($shipping->shipping_method==1)
                                            Tiền mặt
                                            @else
                                            Chuyển khoản
                                            @endif
                                        </td>
                                     
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                    <!-- END USER DATA-->
                </div>
             
            </div>
            <div class="row m-t-30">
                <div class="col-lg-12">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Thông tin sơn phảm</h3>
                        

                            
                        <div class="table-responsive table-data">
                            <table class="table ">
                                @foreach ($all_order as $key => $or)
                                @if($or->order_status==1)

                                
                             <form action="">
                                @csrf
                                <td colspan="4" >
                                    <select name="" class="form-control order_details" id="">
                                        <option >------ Chỉnh sữa trạng thái đơn hàng ------</option>
                                        <option id="{{$or->order_id}}" value="1" selected>Đang chờ xử lý</option>
                                        <option id="{{$or->order_id}}" value="2">Đã xử lý đơn hàng</option>                  
                                        <option id="{{$or->order_id}}" value="3">Đã hủy đơn hàng/ tậm giữ</option>
                                    </select>
                                </td>
                            </form>
                         @elseif($or->order_status==2)
                         <form action="">
                            @csrf
                            <td colspan="4" >
                                <select name="" class="form-control order_details" id="">
                                    <option >------ Chỉnh sữa trạng thái đơn hàng ------</option>
                                    <option id="{{$or->order_id}}" value="1" >chưa xử lý</option>
                                    <option  id="{{$or->order_id}} " value="2" selected>Đã xử lý đơn hàng</option>                  
                                    <option  id="{{$or->order_id}}" value="3">Đã hủy đơn hàng</option>
                                </select>
                            </td>
                        </form>
                            @else
                            <form action="">
                                @csrf
                                <td colspan="4" >
                                    <select name="" class="form-control order_details" id="">
                                        <option >------ Chỉnh sữa trạng thái đơn hàng ------</option>
                                        <option id="{{$or->order_id}}" value="1" >chưa xử lý</option>
                                        <option  id="{{$or->order_id}} " value="2" >Đã xử lý đơn hàng</option>                  
                                        <option  id="{{$or->order_id}}" value="3" selected>Đã hủy đơn hàng</option>
                                    </select>
                                </td>
                            </form>
                            @endif
                            @endforeach
                                <thead>
                                    <tr>    <td>
                                        </td>                          
                                        <td>Tên sản phảm</td>
                                        <td>Mã giảm giá</td>
                                        <td>Hàng tồn kho</td>
                                        <td>Số lượng</td> 
                                        
                                        <td>Giá</td>
                                   
                                        <td>Tổng tiền</td>
                                    </tr>
                                </thead>
                                <tbody>     
                                    @php
                                    $total=0;
                                    @endphp
                                        @foreach ($order_details as $key => $product)
                                        @php
                                            $subtotal = $product->product_price*$product->product_sales_quantity;
                                            $total+=$subtotal;
                                        @endphp
                                        <tr class="color_qty_{{$product->product_id}}">
                                            <td>
                                            {{$key}}
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6>{{$product->product_name}}</h6>
                                               
                                            </div>
                                        </td>
                                        <td >
                                            @if($product->product_coupon!=0)
                                            {{$product->product_coupon}}/
                                            @if($coupon_condition==1)
                                            <strong class="">Giảm giá {{$coupon_number}}%</strong>
                                            @elseif($coupon_condition==2)
                                            <strong class="">Giảm giá {{number_format($coupon_number)}} VNĐ</strong>
                                            @endif
                                            @else
                                            Không có
                                            @endif
                                        </td>
                                     <td>
                                        {{$product->product->product_quantity}}
                                     </td>
                                        <td>
                                          
                                            <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}}  class="order_qty_{{$product->product_id}}" value="{{$product->product_sales_quantity}}" name="product_sales_quantity">
                                            <input type="hidden" name="order_product_id" class="order_product_id" value="{{$product->product_id}}">
                                            <input type="hidden" name="order_code" class="order_code" value="{{$product->order_code}}">
                                            
                                            <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$product->product_id}}" value="{{$product->product->product_quantity}}">
                                            @if($order_status!=2)
                                            <button class="btn btn-success update_quantity_order" data-product_id="{{$product->product_id}}" name="update_quantity_order">Cập nhật</button>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="">{{$product->product_price}} VNĐ</span>
                                        </td>
                                        <td>
                                            <span class="">{{$product->product_price*$product->product_sales_quantity}} VNĐ</span>
                                        </td>
                                      
                                    </tr>
                                        @endforeach
                                     
                                        <tr>
                                            @php
                                            $total_coupon=0;
                                            @endphp
                                            @if($coupon_condition==1)
                                            @php
                                                $total_after_coupon = ($total*$coupon_number)/100;
                                                $total_coupon = $total-$total_after_coupon;
                                            @endphp
                                            @elseif($coupon_condition==2)
                                            @php
                                                $total_after_coupon = $total-$coupon_number;
                                                $total_coupon = $total_after_coupon;
                                            @endphp
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                @php
                                                $fee_ship=0;
                                                @endphp
                                                Phí ship:
                                                @if($total>500000)
                                                 0 VNĐ
                                                @else

                                                @php
                                                $fee_ship=30000;
                                                echo number_format($fee_ship);
                                                @endphp
                                                @endif

                                            </td>
                                            <td class="">
                                              tổng hóa đơn {{number_format($total)}} VNĐ 
                                            </td>
                                           
                                            <td>
                                                <strong class="">Tổng sau cùng {{number_format($total_coupon+$fee_ship)}} VNĐ</strong>
                                            </td>

                                        </tr>
                                    
                                        <tr>
                                            <a href="{{url('/print-order/'.$product->order_code)}}">In Đơn hàng</a>
                                        </tr>
                                </tbody>

                            </table>
                        </div>
                       
                    </div>
                    <!-- END USER DATA-->
                </div>
             
            </div>
        
        </div>
    </div>
</div>

@endsection