@extends('layout')
@section('content')
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        @foreach($details_product as $key => $pro)
                        <li class="breadcrumb-item ">{{$pro->category_name}}</li>
                        <li class="breadcrumb-item  active">{{$pro->product_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    
    
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            @foreach($details_product as $key => $pro)
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                   <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-lg-image-1">
                            <div class="lg-image">
                                <a  class="set_image2" href="{{url('public/uploads/product/'.$pro->product_image)}}" class="img-poppu"><img src="{{url('public/uploads/product/'.$pro->product_image)}}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="assets/images/product/2.jpg" class="img-poppu"><img src="/assets/images/product/2.jpg" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="assets/images/product/3.jpg" class="img-poppu"><img src="/assets/images/product/3.jpg" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="assets/images/product/4.jpg" class="img-poppu"><img src="/assets/images/product/4.jpg" alt="product image"></a>
                            </div>
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">										
                            <div class="sm-image"><img src="/assets/images/product/1.jpg" alt="product image thumb"></div>
                            <div class="sm-image"><img src="/assets/images/product/2.jpg" alt="product image thumb"></div>
                            <div class="sm-image"><img src="/assets/images/product/3.jpg" alt="product image thumb"></div>
                            <div class="sm-image"><img src="/assets/images/product/4.jpg" alt="product image thumb"></div>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>
        
                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content">
                   <div class="cart-quantity">
                        <div class="product-info">
                            <h2>{{$pro->product_name}}</h2>
                            <div class="price-box">
                                <span class="old-price">{{ number_format($pro->product_price, 0, ',', '.') . ' VNĐ' }}</span>
                                <span class="new-price">{{ number_format($pro->product_price, 0, ',', '.') . ' VNĐ' }}</span>
                                <span class="discount discount-percentage">Save 5%</span>
                            </div>
                          
                        
                            <div class="single-add-to-cart">
                              
                                <form action=""   >
                                    @csrf
                                    <input type="hidden" value="{{$pro->product_id}}"
                                    class="cart_product_id_{{$pro->product_id}}">
   
                                   <input type="hidden" value="{{$pro->product_name}} 
                                   " class="cart_product_name_{{$pro->product_id}}">
   
                                   <input type="hidden" value="{{$pro->product_image}} 
                                   " class="cart_product_image_{{$pro->product_id}}"> 

                                   <input type="hidden" value="{{$pro->product_quantity}} 
                                   " class="cart_product_quantity_{{$pro->product_id}}"> 
                                   
                                 
   
                                   <input type="hidden" value="{{$pro->product_price}}"
                                   class="cart_product_price_{{$pro->product_id}}">
                               

                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input name="qty" class="cart-plus-minus-box cart_product_qty_{{$pro->product_id}}" value="1" type="number">
                                            <input name="productid_hidden" type="hidden"  value="{{$pro->product_id}}">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                </form>
                                    <button class="add-to-cart"  data-id_product="{{$pro->product_id}}" style="margin-right: 15px" type="submit">Thêm giỏ hàng</button>
                                    {{-- <button class="add-to-cart" type="submit">Mua ngay</button> --}}
                                
                            </div>
                            <div class="product-availability">
                              <i class="fa fa-check"></i> Còn hàng
                            </div>
                            <div class="product-social-sharing">
                                 <p class="" >{!!$pro->product_desc!!}</p>
                            </div>
                            
                        </div>
                    </div>
                
                    </div>
                </div> 
          
            </div>
            @endforeach
            <div class="row">
                <div class="col-12">
                    <div class="product-details-tab mt--60">
                        <ul role="tablist" class="mb--50 nav">
                            <li class="active" role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#description" class="active">Mô tả sản phảm</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#sheet">Chi tiết sản phảm</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#reviews">Đánh giá</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap">
                                <div class="product_desc mb--30">
                                    <h2 class="title_3">Mô tả </h2>
                                   {!!$pro->product_desc!!}
                                </div>
                             
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                            <div class="pro_feature">
                                <h2 class="title_3">Chi tiết sản phảm</h2>
                                {!!$pro->product_content!!}

                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        @php
                         $url = Request::url();

                        @endphp
                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                            <div class="review_address_inner">
                                <!-- Start Single Review -->
                                <div class="fb-comments" data-href="{{$url}}" data-width="100%" data-numposts="5"></div>
                                <!-- End Single Review -->
                                <!-- Start Single Review -->
                                
                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                                                  
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    
    
    <!-- Product Area Start -->
    <div class="product-area section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Sản phảm liên quan</h2>
                        <p>Most Trendy 2018 Clother</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                    @foreach($related_product as $key => $related)
                    <div class="col-12">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a  class="set_image" href="{{url('chi-tiet-san-pham/'.$related->slug.'/'.$related->product_id)}}" ><img src="{{asset('public/uploads/product/'.$related->product_image)}}" alt="product image"></a>
                                <span class="label-product label-new">newasdasd</span>
                                <span class="label-product label-sale">-9%</span>
                                <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{url('chi-tiet-san-pham/'.$related->slug.'/'.$related->product_id)}}" class="name_product">{{$related->product_name}}</a></h3>
                                <div class="price-box">
                                    <span class="new-price">$53.27</span>
                                    <span class="old-price">{{ number_format($related->product_price, 0, ',', '.') . ' VNĐ' }}</span>
                                </div>
                                <div class="product-action">
                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                    <div class="star_content">
                                        <ul class="d-flex">
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                    @endforeach
                  
                
                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
    
@endsection
