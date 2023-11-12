@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Liệt kê danh mục sản phảm
            </h3>
            <?php
            $message = session()->get('message');
               if ($message) {
                   echo '<div class="alert alert-success">' . $message . '</div>';
                   session()->forget('message');
               }
               ?>
           </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th>Từ khóa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_category_product as $key => $cate_pro)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$cate_pro->category_name}}</td>
                                    <td>{{$cate_pro->category_desc}}</td>
                                    <td class="process">
                                        @if($cate_pro->category_status==0)
                                                                            
                                            <a href="{{url('unactive-category-product/'.$cate_pro->category_id)}}" class="btn btn-outline-danger">
                                                <i class="fas fa-times-circle">Ẩn</i></a>
                                            </a>
                                       
                                        @else
                                      
                                            <a href="{{url('active-category-product/'.$cate_pro->category_id)}}" class="btn btn-outline-success">
                                                <i class="fas fa-check-circle">Hiển</i></a>
                                            </a>


                                      @endif
                                    </td>
                                    <td>{{$cate_pro->meta_keywords}}</td>
                                    
                                    <td>
                                        <a href="{{route('edit-category-product',$cate_pro->category_id)}}" class="btn btn-outline-primary">Sửa</a>
                                        <a href="{{url('delete-category-product',$cate_pro->category_id)}}" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                </tr>
                               @endforeach

                            </tbody>
                        </table>
                        {{-- import data --}}
                  
                    </div>
                 
              
                    <!-- END DATA TABLE-->
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