@extends('admin_layout')
@section('admin_content')\

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                
              
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            @foreach ($edit_product as $key => $pro)
                            <strong>Form</strong> cập nhật sản phảm
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
                            <form action="{{url('update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_name" class=" form-control-label">Tên sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$pro->product_name}}" id="slug" onkeyup="ChangeToSlug();" name="product_name" placeholder="Text" class="form-control">
                                        @error('product_name')
                                        <p  class="alert alert-danger"> {{ $message }}</p>
                                         @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_quantity" class=" form-control-label">Số lượng Sản phảm </label>
                                    
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" value="{{$pro->product_quantity}}" name="product_quantity" placeholder="Điền số lượng sản phảm" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">Slug</label>
                    
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="convert_slug" value="{{$pro->slug}}" name="slug_product" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_desc" class=" form-control-label">Mô tả sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  value=""  name="product_desc"  rows="9" placeholder="Mô tả sản phẩm" class="form-control">{{$pro->product_desc}}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_content" class=" form-control-label">Nội dung sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea   value="" id="edit1" name="product_content" id="textarea-input" rows="9" placeholder="Nội Dung sản phẩm" class="form-control">{{$pro->product_content}}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_image" class=" form-control-label">Hình ảnh sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="product_image" class="form-control-file">
                                        <img src="{{url('public/uploads/product/'.$pro->product_image)}}" alt="" style="height: 150px">
                                        
                                    </div>
                                    
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_keywords" class=" form-control-label">Từ khóa san pham</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"  name="product_keywords" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$pro->meta_keywords}}</textarea>
                                    </div>
                                   
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product_price" class=" form-control-label">Giá sản phẩm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" value="{{$pro->product_price}}" id="text-input" name="product_price" placeholder="giá" class="form-control">
                                        @error('product_price')
                                        <p  class="alert alert-danger"> {{ $message }}</p>
                                         @enderror
                                    </div>
                                </div>




                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Danh mục sản phảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_cate" id="select" class="form-control">
                                            @foreach ($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected  value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                            @endforeach
                                           
                                         
                                          
                               
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Thương hiệu</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_brand" id="select" class="form-control">
                                            @foreach ($brand_product as $key => $brand)
                                            @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
                                            @endforeach
                                          
                               
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Ẩn/Hiện</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="product_status" id="select" class="form-control">
                                     
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>
                                          
                               
                                        </select>
                                    </div>
                                </div>
                            
                             
                              
                             
                              
                        <div class="card-footer">
                            <button type="submit" name="add_product" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Cập nhật 
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                    </form>
                    @endforeach
                   
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