<div class="hero-slider-box">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="hero-slider hero-slider-two">
                    @foreach($slider as $key => $sli)
                    <div class="single-slide" style="background-image: url(public/uploads/slider/{{$sli->slider_image}})">
                        <!-- Hero Content One Start -->
                        <div class="hero-content-one container">
                            <div class="row">
                                <div class="col"> 
                                    <div class="slider-text-info">
                                        <h1>{{$sli->slider_name}}</h1>
                                        {{-- <h1>Street Style</h1> --}}
                                        <p>{{$sli->slider_desc}}</p>
                                        <a href="shop.html" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i> Shop Now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hero Content One End -->
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Our Services Area Start -->
  <div class="our-services-area section-pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- single-service-item start -->
                <div class="single-service-item">
                    <div class="our-service-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="our-service-info">
                        <h3>Free Shipping</h3>
                        <p>Free shipping on all US order or order above $200</p>
                    </div>
                </div>
                <!-- single-service-item end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- single-service-item start -->
                <div class="single-service-item">
                    <div class="our-service-icon">
                        <i class="fa fa-support"></i>
                    </div>
                    <div class="our-service-info">
                        <h3>Support 24/7</h3>
                        <p>Contact us 24 hours a day, 7 days a week</p>
                    </div>
                </div>
                <!-- single-service-item end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- single-service-item start -->
                <div class="single-service-item">
                    <div class="our-service-icon">
                        <i class="fa fa-undo"></i>
                    </div>
                    <div class="our-service-info">
                        <h3>30 Days Return</h3>
                        <p>Simply return it within 30 days for an exchange</p>
                    </div>
                </div>
                <!-- single-service-item end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- single-service-item start -->
                <div class="single-service-item">
                    <div class="our-service-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="our-service-info">
                        <h3>100% Payment Secure</h3>
                        <p>We ensure secure payment with PEV</p>
                    </div>
                </div>
                <!-- single-service-item end -->
            </div>
        </div>
    </div>
</div>
<!-- Our Services Area End -->  