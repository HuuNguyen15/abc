@extends('admin_layout')
@section('admin_content')\

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                
              
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form</strong> danh mục sản phảm
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
                            @foreach ($edit_category_product as $key => $edit_value)
                            <form action="{{route('update-category-product',$edit_value->category_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_name"  class=" form-control-label">Tên danh mục sản phảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" value="{{$edit_value->category_name}}" id="slug" onkeyup="ChangeToSlug();" name="category_product_name" placeholder="Text" class="form-control">
                                        @error('category_product_name')
                                        <p  class="alert alert-danger"> {{ $message }}</p>
                                         @enderror


                                    </div>
                                </div>
                                   
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="" class=" form-control-label">Slug</label>
                                    
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="convert_slug"  value="{{$edit_value->category_slug}}" name="slug_category_product" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                               
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_desc" class=" form-control-label">Mô tả danh mục</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                       
                                        <textarea  style="resize: none"   name="category_product_desc" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$edit_value->category_desc}}</textarea>
                                        @error('category_product_desc')
                                        <p  class="alert alert-danger"> {{ $message }}</p>
                                         @enderror
                                         


                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_keywords" class=" form-control-label">Từ khóa danh mục</label>
                                    </div>
                                  
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"   name="category_product_keywords" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$edit_value->meta_keywords}}</textarea>
                                       
                                    </div>
                                </div>

                            


        
                            
                             
                              
                             
                              
                        <div class="card-footer">
                            <button type="submit" name="add_category_product" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Cập nhật
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                        @endforeach

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