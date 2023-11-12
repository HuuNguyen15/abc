@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Liệt kê  sản phảm
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
                                    <th>Tên sản phảm</th>
                                    <th>hình ảnh</th>
                                    <th>giá</th>
                                    <th>Số lượng</th>
                                    <th>mô tả</th>
                                    <th>danh mục</th>
                                    <th>thương hiệu</th>
                                    <th>hiển thị</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_product as $key => $pro)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$pro->product_name}}</td>
                                    <td><img src="public/uploads/product/{{$pro->product_image}}" height="100" width="100"></td>
                                    <td>{{$pro->product_price}}</td>
                                    <td>{{$pro->product_quantity}}</td>
                                    <td>{{$pro->product_desc}}</td>
                                    <td>{{$pro->category_name}}</td>
                                    <td>{{$pro->brand_name}}</td>
                                    
                                    <td class="process">
                                        @if($pro->product_status==0)
                                                                            
                                            <a href="{{url('unactive-product/'.$pro->product_id)}}" class="btn btn-outline-danger">
                                                <i class="fas fa-times-circle">Ẩn</i></a>
                                            </a>
                                       
                                        @else
                                      
                                            <a href="{{url('active-product/'.$pro->product_id)}}" class="btn btn-outline-success">
                                                <i class="fas fa-check-circle">Hiển</i></a>
                                            </a>


                                      @endif
                                    </td>
                                    
                                    <td>
                                        <a href="{{url('edit-product',$pro->product_id)}}" class="btn btn-outline-primary">Sửa</a>
                                        <a onclick=" return confirm('Bạn Có Muốn xóa sản phẩm này thật không')" href="{{url('delete-product',$pro->product_id)}}" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                </tr>
                               @endforeach

                            </tbody>
                        </table>
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