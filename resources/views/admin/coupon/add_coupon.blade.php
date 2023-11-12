@extends('admin_layout')
@section('admin_content')\

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">           
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form</strong> Mã giảm giá
                            @if ($errors->any())
                            <div class="alert alert-primary">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-body card-block">
                            <form action="{{url('/save-coupon-code')}}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">Tên Mã giảm giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="coupon_name"  placeholder="Text" class="form-control">
                                  

                                    </div>
                                </div>
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label"> Mã giảm giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="coupon_code"  placeholder="Text" class="form-control">
                                    

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_name" class=" form-control-label"> Số lượng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="coupon_time"  placeholder="Text" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Tinh năng mã</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="coupon_condition" id="select" class="form-control">
                                            <option value="0">--Chọn--</option>
                                            <option value="1">Giảm theo phần trăn</option>
                                            <option value="2">Giảm theo tiền</option>
                                        </select>
                                    </div>
                                </div>
                            
                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label"> nhập số phần trăm% hoặc tiền giảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="coupon_number"  placeholder="Text" class="form-control">                                 
                                    </div>
                                </div>
                           
                                       
                         <div class="card-footer">
                            <button type="submit" name="" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Thêm mã
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form> 
                    </div>
                   
                </div>
      
            </div>
          
        </div>
    </div>
</div>


@endsection