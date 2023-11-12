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
                            <form action="{{route('save-category-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              {{csrf_field()}}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_name" class=" form-control-label">Tên danh mục sản phảm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text"  name="category_product_name" id="slug" onkeyup="ChangeToSlug();" placeholder="Text" class="form-control">
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
                                        <input type="text" id="convert_slug" name="slug_category_product" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                               
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_desc" class=" form-control-label">Mô tả danh mục</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"  name="category_product_desc" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                    </div>
                                    @error('category_product_name')
                                    <p  class="alert alert-danger"> {{ $message }}</p>
                                     @enderror
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category_product_keywords" class=" form-control-label">Từ khóa danh mục</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea  style="resize: none"  name="category_product_keywords" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                    </div>
                                   
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Ẩn/Hiện</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_product_status" id="select" class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                          
                               
                                        </select>
                                    </div>
                                </div>
                            
                             
                              
                             
                              
                        <div class="card-footer">
                            <button type="submit" name="add_category_product" class="btn btn-primary btn-sm">
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