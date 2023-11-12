@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Liệt kê tất cả hình ảnh
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
                                    <th>Tên hình ảnh</th>
                                    <th>hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>tình trạng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $key => $sli)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$sli->slider_name}}</td>
                                    <td>
                                        <img src="public/uploads/slider/{{$sli->slider_image}}"  height="50px" width="300px" alt="">
                                       
                                    </td>
                                    <td>{{$sli->slider_desc}}</td>
                                    <td class="process">
                                        @if($sli->slider_status==0)
                                                                            
                                            <a href="{{url('unactive-slider/'.$sli->slider_id)}}" class="btn btn-outline-danger">
                                                <i class="fas fa-times-circle">Ẩn</i></a>
                                            </a>
                                       
                                        @else
                                      
                                            <a href="{{url('active-slider/'.$sli->slider_id)}}" class="btn btn-outline-success">
                                                <i class="fas fa-check-circle">Hiển</i></a>
                                            </a>


                                      @endif
                                    </td>
                                  
                                    <td>
                                      
                                        <a href="{{url('delete-slider',$sli->slider_id)}}" class="btn btn-outline-danger">Xóa</a>
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