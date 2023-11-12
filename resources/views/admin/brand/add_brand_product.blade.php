@extends('admin_layout')
@section('admin_content')\

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                
              
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form</strong> Thương hiệu sản phảm
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
                            <form action="{{route('save-brand-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="brand_product_name" class=" form-control-label">Tên Thương hiệu sản phảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="slug" onkeyup="ChangeToSlug();" name="brand_product_name" placeholder="Text" class="form-control">
                                        @if ($errors->has('brand_product_name'))
                                        <span class="text-danger">{{ $errors->first('brand_product_name') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">Slug</label>
                                    
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="convert_slug" name="slug_brand_product" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                               
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="brand_product_desc" class=" form-control-label">Mô tả Thương hiệu</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"  name="brand_product_desc" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                        @if ($errors->has('brand_product_desc'))
                                        <span class="text-danger">{{ $errors->first('brand_product_desc') }}</span>
                                        @endif
                                    </div>
                                </div>

                                       
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="brand_product_keywords" class=" form-control-label">Từ khóa</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"  name="brand_product_keywords" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                       
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Ẩn/Hiện</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="brand_product_status" id="select" class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                          
                               
                                        </select>
                                    </div>
                                </div>
                            
                             
                              
                             
                              
                        <div class="card-footer">
                            <button type="submit" name="add_brand_product" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Thêm 
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