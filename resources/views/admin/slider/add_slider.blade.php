@extends('admin_layout')
@section('admin_content')\

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                
              
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form</strong> Thêm Slider
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
                            <form action="{{url('insert-slider')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="brand_product_name" class=" form-control-label">Tên Slider</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="slider_name" placeholder="Text" class="form-control">
                                       

                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">Mô tả</label>
                                    
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="slider_desc" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                               


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Ẩn/Hiện</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="slider_status" id="select" class="form-control">                                       
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            
                             
                              
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">hình ảnh</label>
                                       
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" name="slider_image" id="">
                                    </div>
                                </div>
                             
                              
                        <div class="card-footer">
                            <button type="submit" name="add_slider" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Thêm ảnh
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                   
                </div>
      
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection