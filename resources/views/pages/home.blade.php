@extends('layout')

@section('content')


<!-- Banner area start -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <!-- single-banner start -->
                <div class="single-banner mt--30">
                    <a href="shop.html"><img src="assets/images/banner/1.jpg" alt=""></a>
                </div>
                <!-- single-banner end -->
            </div>
            <div class="col-lg-4 col-md-4">
                <!-- single-banner start -->
                <div class="single-banner mt--30">
                    <a href="shop.html"><img src="assets/images/banner/2.jpg" alt=""></a>
                </div>
                <!-- single-banner end -->
            </div>
            <div class="col-lg-4 col-md-4">
                <!-- single-banner start -->
                <div class="single-banner mt--30">
                    <a href="shop.html"><img src="assets/images/banner/3.jpg" alt=""></a>
                </div>
                <!-- single-banner end -->
            </div>
        </div>
    </div>
</div>
<!-- Banner area end -->

<!-- Product Area Start -->
<div class="product-area section-pt section-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title start -->
                <div class="section-title">
                    <h2>New Arrivals </h2>
                    <p>Most Trendy 2018 Clother</p>
                </div>
                <!-- section-title end -->
            </div>
        </div>
        <!-- product-wrapper start -->
        <div class="product-wrapper">
            <div class="product-slider">
                @foreach($all_product as $product)
                <div class="col-12">
                    <!-- single-product-wrap start -->
                    <div class="single-product-wrap">
                        <div class="product-image">
                            <a  class="set_image" href="{{url('chi-tiet-san-pham/'.$product->slug.'/'.$product->product_id)}}"><img  src="{{url('public/uploads/product/'.$product->product_image)}}" alt=""></a>
                            <span class="label-product label-new">new</span>
                            <span class="label-product label-sale">-7%</span>
                            <div class="quick_view">
                                <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <form >
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}"
                                 class="cart_product_id_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_name}} 
                                " class="cart_product_name_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_image}} 
                                " class="cart_product_image_{{$product->product_id}}"> 
                                
                                <input type="hidden" value="1 
                                " class="cart_product_qty_{{$product->product_id}}">  
                                
                                <input type="hidden" value="{{$product->product_quantity}} 
                                " class="cart_product_quantity_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_price}}"
                                class="cart_product_price_{{$product->product_id}}">


                            <h3><a href="{{url('chi-tiet-san-pham/'.$product->slug.'/'.$product->product_id)}}" class="name_product">{{$product->product_name}}</a></h3>
                            <div class="price-box">
                                <span class="new-price">{{number_format($product->product_price).'  '.' VNĐ'}}</span>
                                <span class="old-price">$54.49</span>
                            </div>
                            <div class="product-action">
                            <button type="button" class="add-to-cart" title="Add to cart" data-id_product="{{$product->product_id}}" ><i class="fa fa-plus"></i> Thêm giỏ hàng</button>
                          
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- single-product-wrap end -->

                  
                </div>
                @endforeach
                
            </div>

            <div class="product-slider">
                @foreach($all_product2 as $product)
                <div class="col-12">
                    <!-- single-product-wrap start -->
                    <div class="single-product-wrap">
                        <div class="product-image">
                            <a  class="set_image" href="{{url('chi-tiet-san-pham/'.$product->slug.'/'.$product->product_id)}}"><img  src="{{url('public/uploads/product/'.$product->product_image)}}" alt=""></a>
                            <span class="label-product label-new">new</span>
                            <span class="label-product label-sale">-7%</span>
                            <div class="quick_view">
                                <a href="#" title="quick view" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <form >
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}"
                                 class="cart_product_id_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_name}} 
                                " class="cart_product_name_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_image}} 
                                " class="cart_product_image_{{$product->product_id}}"> 
                                
                                <input type="hidden" value="1 
                                " class="cart_product_qty_{{$product->product_id}}">  
                                
                                <input type="hidden" value="{{$product->product_quantity}} 
                                " class="cart_product_quantity_{{$product->product_id}}">

                                <input type="hidden" value="{{$product->product_price}}"
                                class="cart_product_price_{{$product->product_id}}">


                            <h3><a href="{{url('chi-tiet-san-pham/'.$product->slug.'/'.$product->product_id)}}" class="name_product">{{$product->product_name}}</a></h3>
                            <div class="price-box">
                                <span class="new-price">{{number_format($product->product_price).'  '.' VNĐ'}}</span>
                                <span class="old-price">$54.49</span>
                            </div>
                            <div class="product-action">
                            <button type="button" class="add-to-cart" title="Add to cart" data-id_product="{{$product->product_id}}" ><i class="fa fa-plus"></i> Thêm giỏ hàng</button>
                          
                            </div>
                            </form>
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

<!-- Banner area start -->
<div class="banner-area-two">
    <div class="container-fluid plr-40">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- single-banner start -->
                <div class="single-banner-two mt--30">
                    <a href="shop.html" class="set_image_two"><img  src="https://cdn.vuahanghieu.com/unsafe/730x0/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload//home-banner/20-03-2023/502319844_banner-slider-04.jpg" alt=""></a>
                </div>
                <!-- single-banner end -->
            </div>
            <div class="col-lg-6 col-md-6">
                <!-- single-banner start -->
                <div class="single-banner-two mt--30">
                    <a href="shop.html" class="set_image_two" ><img  src="https://cdn.vuahanghieu.com/unsafe/730x0/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload//home-banner/20-03-2023/1904063449_banner-slider-08.jpg" alt=""></a>
                </div>
                <!-- single-banner end -->
            </div>
        </div>
    </div>
</div>
<!-- Banner area end -->

<!-- Trending Product Area Start -->
<div class="trending-products-area section-pt-70">
    <div class="container">
        <div class="product-three-area pt--60">
            <div class="row">
                <div class="col">
                    <div class="section-titele-four">
                        <div class="section-titele-four-inner">
                            <h2>Hot Categories</h2>
                        </div>
                        <p>Most Trendy 2018 Clother</p>
                    </div>
                </div>
            </div>
            <div class="product-categproes-two">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- categories-list-post-item start -->
                        <div class="categories-list-post-item mt--30">
                            <img src="assets/images/category/box1.jpg" alt="">
                            <a href="#" class="category-inner">Shoes</a>
                        </div>
                        <!-- categories-list-post-item end -->
                    </div>
                    <div class="col-lg-4">
                        <!-- categories-list-post-item start -->
                        <div class="categories-list-post-item  mt--30">
                            <img src="assets/images/category/box2.jpg" alt="">
                            <a href="#" class="category-inner">Bags</a>
                        </div>
                        <!-- categories-list-post-item end -->
                    </div>
                    <div class="col-lg-4">
                        <!-- categories-list-post-item start -->
                        <div class="categories-list-post-item mt--30">
                            <img src="assets/images/category/box3.jpg" alt="">
                            <a href="#" class="category-inner">Shirts</a>
                        </div>
                        <!-- categories-list-post-item end -->
                    </div>
                    <div class="col-lg-8">
                        <!-- categories-list-post-item start -->
                        <div class="categories-list-post-item  mt--30">
                            <img src="assets/images/category/box4.jpg" alt="">
                            <a href="#" class="category-inner">Jackets</a>
                        </div>
                        <!-- categories-list-post-item end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Product Area end -->

<!-- Latest Blog Posts Area start -->
<div class="latest-blog-post-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title start -->
                <div class="section-title section-bg-3">
                    <h2>Tin tức </h2>
                    <p>Tin tức thời trang nổi bật</p>
                </div>
                <!-- section-title end -->
            </div>
        </div>
        <div class="latest-blog-slider">
            <!-- single-latest-blog start -->
            <div class="single-latest-blog mt--30">
                <div class="latest-blog-image">
                    <a href="blog-details.html" class="set_image_blog">
                        <img src="https://cdn.vuahanghieu.com/unsafe/0x300/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/news/2023/10/bst-hermes-women-s-spring-summer-2024-thanh-thoat-va-quyen-ru-10102023170650.jpg" alt="">
                    </a>
                </div>
                <div class="latest-blog-content">
                    <h4><a href="blog-details.html">Work with customizer</a></h4>
                    <div class="post_meta">
                        <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 05, 2018</span>
                        <span class="meta_author"><span></span>Demo Name</span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                </div>
            </div>
            <!-- single-latest-blog end -->
            <!-- single-latest-blog start -->
            <div class="single-latest-blog mt--30">
                <div class="latest-blog-image">
                    <a href="blog-details.html" class="set_image_blog">
                        <img src="https://cdn.vuahanghieu.com/unsafe/0x300/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/news/2023/10/mong-lep-mac-gi-tips-chon-do-hack-vong-ba-cang-day-quyen-ru-10102023130850.jpg" alt="">
                    </a>
                </div>
                <div class="latest-blog-content">
                    <h4><a href="blog-details.html">Go to New Horizonts</a></h4>
                    <div class="post_meta">
                        <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>may 17, 2018</span>
                        <span class="meta_author"><span></span>Demo Name</span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                </div>
            </div>
            <!-- single-latest-blog end -->
            <!-- single-latest-blog start -->
            <div class="single-latest-blog mt--30">
                <div class="latest-blog-image">
                    <a href="blog-details.html" class="set_image_blog">
                        <img src="https://cdn.vuahanghieu.com/unsafe/0x300/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/news/2023/10/dep-chay-gi-mon-phu-phu-kien-dan-chay-viet-me-man-09102023155421.jpg" alt="">
                    </a>
                </div>
                <div class="latest-blog-content">
                    <h4><a href="blog-details.html">What is Bootstrap?</a></h4>
                    <div class="post_meta">
                        <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>june 11, 2018</span>
                        <span class="meta_author"><span></span>Demo Name</span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                </div>
            </div>
            <!-- single-latest-blog end -->
            <!-- single-latest-blog start -->
            <div class="single-latest-blog mt--30">
                <div class="latest-blog-image">
                    <a href="blog-details.html">
                        <img src="https://cdn.vuahanghieu.com/unsafe/0x300/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/news/2023/10/toc-lob-la-gi-kieu-toc-lob-dep-nhat-cho-nu-09102023161520.jpg" alt="">
                    </a>
                </div>
                <div class="latest-blog-content">
                    <h4><a href="blog-details.html">Try comfort work </a></h4>
                    <div class="post_meta">
                        <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 13, 2018</span>
                        <span class="meta_author"><span></span>Demo Name</span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the ...</p>
                </div>
            </div>
            <!-- single-latest-blog end -->
        </div>
    </div>
</div>
<!-- Latest Blog Posts Area End -->

<!-- Our Brand Area Start -->
<div class="our-brand-area mb--30">
    <div class="container">
        <div class="row our-brand-active text-center">
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/1.png" alt=""></a>
                </div>
            </div>
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/2.png" alt=""></a>
                </div>
            </div>
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/3.png" alt=""></a>
                </div>
            </div>
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/4.png" alt=""></a>
                </div>
            </div>
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/5.png" alt=""></a>
                </div>
            </div>
            <div class="col-12">
                <div class="single-brand">
                    <a href="#"><img src="assets/images/brand/6.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Brand Area End -->

@endsection