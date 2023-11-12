   @extends('layout')
   @section('content')
   <!-- Page Header Start -->

   <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!-- Page Header End -->



    <!-- Cart Start -->
 
       <div class="content-wraper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <div  class="cart-table">
                        <form id="cart-form" method="POST" class="cart-quantity">
                            @csrf
                    <div class="table-content table-responsive">
                            
                            @php
                            // $message=Session()->get('message');
                            // if($message){
                            //     echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
                            //     Session()->put('message',null);
                            // }
                            $error=Session()->get('error');
                            if($error){
                                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                                Session()->put('error',null);
                            }

                            @endphp
                             @php
                             $total=0;
                             @endphp
                            <table class="table table-hover">
                                
                               
                                <thead>
                                    <tr>
                                        <th class="plantmore-product-thumbnail">Hình ảnh</th>
                                        <th class="cart-product-name">Sản phảm</th>
                                        <th class="plantmore-product-price">Giá</th>
                                        <th class="plantmore-product-quantity">Số lượng</th>
                                        <th class="plantmore-product-subtotal">Tổng</th>
                                        <th class="plantmore-product-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(Session()->get('cart')==true)
                                   
                                    @foreach(Session()->get('cart') as $key=>$cart)
                                    @php
                                    $subtotal=$cart['product_price']*$cart['product_qty'];
                                    $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td class="plantmore-product-thumbnail">
                                            <a href="#" ><img style="height: 100px" src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt=""></a></td>
                                        <td class="plantmore-product-name">
                                            
                                            <a href="#">
                                            {{$cart['product_name']}}    
                                            </a></td>
                                        <td class="plantmore-product-price"><span class="amount">
                                            {{number_format($cart['product_price'],0,',','.')}} VNĐ    
                                        </span></td>
                                       
                                        <td class="plantmore-product-quantity">
                                           
                                                <input type="number" class="cart_quantity" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                          
                                        </td>
                                      
                                        <td class="product-subtotal"><span class="amount"> {{number_format($subtotal,0,',','.')}} VNĐ  </span></td>
                                        <td class="plantmore-product-remove"><a href="{{url('/delete-product-cart/'.$cart['session_id'])}}"><i class="fa fa-close"></i></a></td>
                                        
                                    </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <center>
                                                <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                                                <a href="{{url('/')}}" style="" class="btn btn">Tiếp tục mua hàng</a>
                                            </center>
                                        </td>
                                    
                                    </tr>

                               @endif

                              
                                   
                             
                               

                                   
                                    
                               
                                 
                                
                           
                            </form>
                            </table>
                           

                        </div> 
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">
                                   
                                    <div class="coupon2">
                                       
                                         <a href="{{url('/')}}" class="btn continue-btn">Tiếp tục mua</a>
                                     </div>
                                    
                                   
                                 </div>
                            <div class="coupon-all">
                            <form action="{{url('/check-coupon')}}" method="POST">
                             @csrf
                             <div class="coupon">
                                <h3>Mã giảm giá</h3>
                                @php
                                $message1=Session()->get('message1');
                                $error1=Session()->get('error1');
                                if($message1){
                                    echo '<div class="alert alert-success" role="alert">'.$message1.'</div>';
                                    Session()->put('message',null);
                                }
                                if($error1){
                                    echo '<div class="alert alert-danger" role="alert">'.$error1.'</div>';
                                    Session()->put('error1',null);
                                }

                                @endphp
                                <p>Nhập mã phiếu giảm giá của bạn nếu bạn có.
                                </p>
                                <input  class="input-text" name="coupon" value="" placeholder="Mã giảm giá" type="text">
                                <input class="button" name="apply_coupon" value="Gửi mã" type="submit">
                            </div>
                            </form>
                            </div>
                            </div>
                            <div class="col-md-4 ml-auto">
            
                                <div class="cart-page-total">
                                    <h2>Tổng hóa đơn</h2>
                                    <ul>
                                        <li>Tạm tính: <span>{{number_format($total,0,',','.')}} VNĐ  </span></li>
                                        <li>Thuế:<span></span></li>
                                        
                                       
                                            @if(Session()->get('coupon'))
                                            @foreach(Session()->get('coupon') as $key=>$cou)
                                                @if($cou['coupon_condition']==1)
                                                <li>
                                                    Mã giảm: {{$cou['coupon_number']}}%
                                                    <span>
                                                        @php
                                                        $total_coupon=($total*$cou['coupon_number'])/100;
                                                    
                                                        echo '<span>' . number_format($total_coupon, 0, ',', '.') .' '. 'VNĐ</span>';
                                                        @endphp
                                                    </span>
                                                </li>
                                                <li>
                                                    Thành tiền: <span>{{number_format($total-$total_coupon,0,',','.')}} VNĐ</span>

                                                </li>
                                                
                                                @elseif($cou['coupon_condition']==2)
                                                    <li>
                                                    Mã giảm: 
                                                                @php
                                                                    $total_coupon=$total-$cou['coupon_number'];
                                                                    echo '<span>' . number_format($total-$total_coupon, 0, ',', '.') . ' VNĐ</span>';
            
                                                                @endphp
                                                    </li>
                                                    <li>
                                                        Thành tiền: <span>{{number_format($total_coupon,0,',','.')}} VNĐ</span>

                                                    </li>
                                            @endif
                                            @endforeach
                                    @endif
                                       
                                      
                                    </ul>
                                
                                    <?php
                                    $customer_id=Session()->get('customer_id');
                                    if($customer_id!=NULL){
                                        ?>
                                       <a  class="proceed-checkout-btn " href="{{url('/checkout')}}">Thanh toán</a>
                                  
                                        <?php
                                    }else{
                                        ?>
                                    <a  class="proceed-checkout-btn " href="{{url('/login-checkout')}}">Thanh toán</a>
                             
                                        <?php
                                    }
                                    
                                    ?>
                                    
                                </div>
                            </div>
                        </div>

                   
                    
               
                    </div>
                </form>
            </div>
        </div>
                </div>
            </div>
        </div>
         </div>
    <!-- Cart End -->
    @endsection