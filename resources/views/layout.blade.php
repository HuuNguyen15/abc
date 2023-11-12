<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- SEO --}}
    <title>{{$meta_title}}</title>
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="author" content="">
    <link rel="canonical" href="{{$url_canonical}}">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    {{-- end seo --}}
    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    
    <!-- Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}">

    
    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=886257863173068" nonce="2NadszxD"></script>

</div>
</head>



<body class="box-body">
<!-- Messenger Plugin chat Code -->



    <!-- Main Wrapper Start -->
    <div class="main-wrapper home-2">
       
        <div class="container-box">
            <!-- header-area start -->
            <div class="header-area">
                <!-- header-top start -->
                <div class="header-top bg-grey">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 order-lg-1 col-md-5 order-1">
                                <div class="top-selector-wrapper">
                                    <ul class="single-top-selector-left">
                                        <!-- Currency Start -->
                                        <li class="currency list-inline-item">
                                            <div class="btn-group">
                                                <button class="dropdown-toggle"> USD $ <i class="fa fa-angle-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                       <li><a href="#">Euro €</a></li>
                                                       <li><a href="#" class="current">USD $</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Currency End -->
                                        <!-- Language Start -->
                                        <li class="language list-inline-item">
                                            <div class="btn-group">
                                                <button class="dropdown-toggle"><img src="assets/images/icon/la-1.jpg" alt="">  Yêu thích <i class="fa fa-angle-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                       <li><a href="#"><img src="assets/images/icon/la-1.jpg" alt=""> English</a></li>
                                                        <li><a href="#"><img src="assets/images/icon/la-2.jpg" alt=""> Français</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Language End -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-2 col-md-12">
                               <!-- logo start -->
                                <div class="logo text-center">
                                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt=""></a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="col-lg-4 order-lg-3 col-lg-4 col-md-7 order-2">
                                <div class="header-bottom-right">
                                    <ul class="single-setting-selector">
                                        <!-- Sanguage Start -->
                                        <li class="setting-top list-inline-item">
                                            <div class="btn-group">
                                                <button class="dropdown-toggle"><i class="fa fa-user-circle-o"></i> Người dùng <i class="fa fa-angle-down"></i></button>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                        <li><a href="my-account.html">Tài khoản</a></li>
                                                        <?php
                                                        $customer_id=Session()->get('customer_id');
                                                        $shipping_id=Session()->get('shipping_id');
                                                        if($customer_id!=NULL && $shipping_id==NULL){
                                                            ?>
                                                            <li><a href="{{url('/checkout')}}">Thanh toán</a></li>
                                                            <?php
                                                        }elseif($customer_id!=NULL && $shipping_id!=NULL)
                                                        {

                                                            ?>
                                                            <li><a href="{{url('/payment')}}">Thanh toán</a></li>
                                                            <?php
                                                        }
                                                        else{
                                                        ?>
                                                        <li><a href="{{url('/login-checkout')}}">Thanh toán</a></li>
                                                        <?php
                                                        }
                                                        ?>


                                                   
                                                        <?php
                                                        $customer_id=Session()->get('customer_id');
                                                        if($customer_id!=NULL){
                                                            ?>
                                                            <li><a href="{{url('logout-checkout')}}">Đăng xuất</a></li>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <li><a href="{{url('login-checkout')}}">Đăng nhập</a></li>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Sanguage End -->
                                    </ul>
                                    <!-- block-search start -->
                                    <div class="block-search">
                                        <div class="trigger-search"><i class="fa fa-search"></i> <span>Search</span></div>
                                        <!-- search-box start -->
                                        <div class="search-box main-search-active">
                                            <form action="{{url('/tim-kiem')}}" method="POST" class="search-box-inner">
                                                @csrf
                                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm ">
                                                <button class="search-btn" name="search_items" value="Tìm kiếm" type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                        <!-- search-box end -->
                                    </div>
                                    <!-- block-search end -->
                                    <div class="shoping-cart">
                                        <div class="btn-group">
                                            <!-- Mini Cart Button start -->
                                            <button class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Giỏ hàng()</button>
                                            
                                            <!-- Mini Cart button end -->
    
                                            <!-- Mini Cart wrap start -->
                                            <div class="dropdown-menu mini-cart-wrap">
                                                <div class="shopping-cart-content">
                                                    <ul class="mini-cart-content">
                                                        <!-- Mini-Cart-item start -->
                                                        <li class="mini-cart-item">
                                                            <div class="mini-cart-product-img">
                                                                <a href="#"><img src="assets/images/cart/1.jpg" alt=""></a>
                                                                <span class="product-quantity">1x</span>
                                                            </div>
                                                            <div class="mini-cart-product-desc">
                                                                <h3><a href="#">Printed Summer Dress</a></h3>
                                                                <div class="price-box">
                                                                    <span class="new-price">$55.21</span>
                                                                </div>
                                                                <div class="size">
                                                                    Size: S
                                                                </div>
                                                            </div>
                                                            <div class="remove-from-cart">
                                                                <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </li>
                                                        <!-- Mini-Cart-item end -->
    
                                                        <!-- Mini-Cart-item start -->
                                                        <li class="mini-cart-item">
                                                            <div class="mini-cart-product-img">
                                                                <a href="#"><img src="assets/images/cart/3.jpg" alt=""></a>
                                                                <span class="product-quantity">1x</span>
                                                            </div>
                                                            <div class="mini-cart-product-desc">
                                                                <h3><a href="#">Faded Sleeves T-shirt</a></h3>
                                                                <div class="price-box">
                                                                    <span class="new-price">$72.21</span>
                                                                </div>
                                                                <div class="size">
                                                                    Size: M
                                                                </div>
                                                            </div>
                                                            <div class="remove-from-cart">
                                                                <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </li>
                                                        <!-- Mini-Cart-item end -->
    
                                                        <li>
                                                            <!-- shopping-cart-total start -->
                                                            <div class="shopping-cart-total">
                                                                <h4>Sub-Total : <span>$127.42</span></h4>
                                                                <h4>Total : <span>$127.42</span></h4>
                                                            </div>
                                                            <!-- shopping-cart-total end -->
                                                        </li>
    
                                                        <li>   
                                                            <!-- shopping-cart-btn start -->
                                                            <div class="shopping-cart-btn">
                                                                <a href="{{url('gio-hang')}}">Xem giỏ hàng</a>
                                                            </div>
                                                            <!-- shopping-cart-btn end -->
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Mini Cart wrap End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header-top end -->
                <!-- Header-bottom start -->
                <div class="header-bottom-area bg-grey header-sticky">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <!-- main-menu-area start -->
                                <div class="main-menu-area text-center">
                                    <nav class="main-navigation">
                                    <ul>
                                        <li  class="active"><a href="{{url('/')}}">Trang chủ </a>
                                            <li><a href="blog.html">Danh mục <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    @foreach ($cate_product as $key=> $cate)
                                                    <li><a href="{{url('danh-muc-san-pham/'.$cate->category_slug)}}">{{$cate->category_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        <li><a href="blog.html">Thương hiệu  <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                @foreach ($brand_product as $key=> $bra)
                                                <li><a href="{{url('thuong-hieu-san-pham/'.$bra->brand_slug)}}">{{$bra->brand_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contact-us.html">Contact us</a></li>
                                    </ul>
                                </nav>
                                </div>
                                <!-- main-menu-area start -->
                            </div>
                            <div class="col">
                                <!-- mobile-menu start -->
                                <div class="mobile-menu d-block d-lg-none"></div>
                                <!-- mobile-menu end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header-bottom end -->
            </div>
            <!-- Header-area end -->
    
            <div class="container-box-inner">
                <!-- Hero Slider start -->
               @if(Request::is('/'))
                @include('includes.banner')
                @endif

                <!-- Hero Slider end -->
                
            @yield('content')
                
            </div>
        </div>
    
        <!-- Footer Aare Start -->
        <footer class="footer-area">
           <!-- footer-top start -->
           <div class="footer-top pt--100 section-pb">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-4 col-md-6">
                            <!-- footer-info-area start -->
                            <div class="footer-info-area">
                                <div class="footer-logo">
                                    <a href="#"><img src="assets/images/logo/logo_footer.png" alt=""></a>
                                </div>
                                <div class="desc_footer">
                                    <p><i class="fa fa-home"></i> <span> 123 Main Street, Anytown, CA 12345 - USA.</span> </p>
                                    <p><i class="fa fa-phone"></i> <span>  (0) 800 456 789</span> </p>
                                    <p><i class="fa fa-envelope-open-o"></i> <span> contact@demoemail.com</span> </p>
                                    <div class="link-follow-footer">
                                        <ul class="footer-social-share">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-info-area end -->
                       </div>
                       <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <!-- footer-info-area start -->
                                    <div class="footer-info-area">
                                        <div class="footer-title">
                                            <h3>Products</h3>
                                        </div>
                                        <div class="desc_footer">
                                            <ul>
                                                <li><a href="#">Prices drop</a></li>
                                                <li><a href="#"> New products</a></li>
                                                <li><a href="#"> Best sales</a></li>
                                                <li><a href="#">  Contact us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- footer-info-area end -->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!-- footer-info-area start -->
                                    <div class="footer-info-area">
                                        <div class="footer-title">
                                            <h3>Our company</h3>
                                        </div>
                                        <div class="desc_footer">
                                            <ul>
                                                <li><a href="#">Delivery</a></li>
                                                <li><a href="#">About us</a></li>
                                                <li><a href="#">Contact us</a></li>
                                                <li><a href="#">Sitemap</a></li>
                                                <li><a href="#">Stores</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- footer-info-area end -->
                                </div>
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-12">
                            <!-- footer-info-area start -->
                            <div class="footer-info-area">
                                <div class="footer-title">
                                    <h3>Join Our Newsletter Now </h3>
                                </div>
                                <div class="desc_footer">
                                    <div class="input-newsletter">
                                       <input name="email" class="input_text" value="" placeholder="Your email address" type="text">
                                       <button class="btn-newsletter"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                    <p>Get E-mail updates about our latest shop and special offers.</p>
                                </div>
                            </div>
                            <!-- footer-info-area end -->
                       </div>
                   </div>
               </div>
            </div>
            <!-- footer-top end -->
            <!-- footer-buttom start -->
            <div class="footer-buttom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="copy-right">
                                <p>Copyright 2021 <a href="#">Boyka</a>.  All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="payment">
                                <img src="assets/images/icon/1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-buttom start -->
        </footer>
        <!-- Footer Aare End -->
        
        <!-- Modal Algemeen Uitgelicht start -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row">
                            <div class="col-lg-5 col-md-6 col-sm-6">
                               <!-- Product Details Left -->
                                <div class="product-details-left">
                                    <div class="product-details-images slider-navigation-1">
                                        <div class="lg-image">
                                            <img src="assets/images/product/1.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="assets/images/product/2.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="assets/images/product/3.jpg" alt="product image">
                                        </div>
                                        <div class="lg-image">
                                            <img src="assets/images/product/5.jpg" alt="product image">
                                        </div>
                                    </div>
                                    <div class="product-details-thumbs slider-thumbs-1">										
                                        <div class="sm-image"><img src="assets/images/product/1.jpg" alt="product image thumb"></div>
                                        <div class="sm-image"><img src="assets/images/product/2.jpg" alt="product image thumb"></div>
                                        <div class="sm-image"><img src="assets/images/product/3.jpg" alt="product image thumb"></div>
                                        <div class="sm-image"><img src="assets/images/product/4.jpg" alt="product image thumb"></div>
                                    </div>
                                </div>
                                <!--// Product Details Left -->
                            </div>
    
                            <div class="col-lg-7 col-md-6 col-sm-6">
                                <div class="product-details-view-content">
                                    <div class="product-info">
                                        <h2>Healthy Melt</h2>
                                        <div class="price-box">
                                            <span class="old-price">$70.00</span>
                                            <span class="new-price">$76.00</span>
                                            <span class="discount discount-percentage">Save 5%</span>
                                        </div>
                                        <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.</p>
                                        <div class="product-variants">
                                            <div class="produt-variants-size">
                                                <label>Size</label>
                                                <select class="form-control-select" >
                                                    <option value="1" title="S" selected="selected">S</option>
                                                    <option value="2" title="M">M</option>
                                                    <option value="3" title="L">L</option>
                                                </select>
                                            </div>
                                            <div class="produt-variants-color">
                                                <label>Color</label>
                                                <ul class="color-list">
                                                    <li><a href="#" class="orange-color active"></a></li>
                                                    <li><a href="#" class="paste-color"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-add-to-cart">
                                            <form action="#" class="cart-quantity">
                                                <div class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </div>
                                                <button class="add-to-cart" type="submit">Add to cart</button>
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
        <!-- Modal Algemeen Uitgelicht end -->
        
        
    </div>
    <!-- Main Wrapper End -->
    
<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();

            if (parseInt(cart_product_quantity) < parseInt(cart_product_qty)) {
                // Sử dụng SweetAlert để hiển thị thông báo lỗi
                swal({
                    title: "Lỗi",
                    text: "Số lượng sản phẩm vượt quá số lượng tồn kho",
                    icon: "error",
                    buttons: "OK",
                });
            } else {
                $.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        cart_product_quantity: cart_product_quantity,
                        _token: _token,
                    },
                    success: function (data) {
                        // Sử dụng SweetAlert để hiển thị thông báo thành công
                        swal("Thành công", "Thêm sản phẩm vào giỏ hàng thành công!", "success");
                    },
                    error: function (data) {
                        // Sử dụng SweetAlert để hiển thị thông báo lỗi
                        swal("Lỗi", "Có lỗi xảy ra. Vui lòng thử lại!", "error");
                    }
                });
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('.add_shipping').click(function(){
            var shipping_name= $('.shipping_name').val();
            var shipping_phone= $('.shipping_phone').val();
            var thanhpho= $('.thanhpho').val();
            var quanhuyen= $('.quanhuyen').val();
            var phuongxa= $('.phuongxa').val();
            var shipping_address= $('.shipping_address').val();
            var shipping_email= $('.shipping_email').val();
            var shipping_notes= $('.shipping_notes').val();
            var payment_option = $("input[name='payment_select']:checked").val(); // Lấy hình thức thanh toán
            var _token= $('input[name="_token"]').val();

            if(thanhpho == '' || quanhuyen == '' || phuongxa == ''){
                        alert('Vui lòng chọn đầy đủ thông tin để tính phí vận chuyển');
            } else{
                $.ajax({
                url:'{{url('/add-shipping-ajax')}}',
                method:'POST',
                data:{
                    shipping_name:shipping_name,
                    shipping_phone:shipping_phone,
                    thanhpho:thanhpho,
                    quanhuyen:quanhuyen,
                    phuongxa:phuongxa,
                    shipping_address:shipping_address,
                    shipping_email:shipping_email,
                    shipping_notes:shipping_notes,
                    payment_option: payment_option,
                    _token:_token,          
                },
                success:function(data){
                   window.location.href="{{url('/')}}";
                    }
            });
            }
      })

        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();  
            var _token = $('input[name="_token"]').val();
            var result = ''; 
          
            if (action == 'thanhpho'){
                result = 'quanhuyen'; // Sửa '==' thành '=' để gán giá trị
            } else {
                result = 'phuongxa'; // Sửa '==' thành '=' để gán giá trị
            }
            $.ajax({
                url: '{{url('/select-delivery-shipping')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>




<script>
    $(document).ready(function () {
        // Biến để kiểm soát trạng thái của yêu cầu AJAX
        var isSubmitting = false;

        // Gửi biểu mẫu sử dụng AJAX khi có thay đổi
        $('.cart_quantity').on('input', function () {
            // Kiểm tra xem có đang thực hiện yêu cầu AJAX hay không
            if (!isSubmitting) {
                // Đặt biến là true để báo hiệu đang thực hiện yêu cầu AJAX
                isSubmitting = true;
                $('#cart-form').submit();
            }
        });

        // AJAX để cập nhật giỏ hàng
        $('#cart-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ url('/update-cart') }}',
                data: $('#cart-form').serialize(),
                success: function (response) {
                    // Nếu có thông báo lỗi và không có số lượng được trả về, hiển thị thông báo lỗi và tải lại trang
                    if (response.message && !response.quantity) {
                        alert(response.message);
                        window.location.reload();
                    } else {
                        // Hiển thị thông báo thành công và tải lại trang
                       
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                    // Tắt biến để cho phép thực hiện yêu cầu AJAX tiếp theo
                    isSubmitting = false;
                },
                error: function (error) {
                    // Hiển thị thông báo lỗi bằng cách sử dụng alert
                    alert('Số lượng hàng trong kho không đủ');
                    window.location.reload();
                    console.log(error);
                }
            });
        });
    });
</script>














</body>

</html>