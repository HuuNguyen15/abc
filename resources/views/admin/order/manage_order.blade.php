@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Liệt kê đơn hàng
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
                                    <th>Mã đơn hàng </th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_order as $key => $order)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$order->order_code}}</td>
                                    <td>
                                        @if ($order->order_status==1)
                                            <span class="badge badge-warning">Đang chờ xử lý</span>
                                        @elseif($order->order_status==2)
                                            <span class="badge badge-success">Đã xử lý</span>
                                        @else
                                            <span class="badge badge-danger">Đã hủy</span>
                                        @endif
                                   
                                  
                                    <td>
                                        {{$order->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{url('/view-order',$order->order_code)}}" class="btn btn-outline-primary">Xem</a>
                                        <a href="{{url('/delete-order',$order->order_id)}}" class="btn btn-outline-danger">Xóa</a>
                                    </td>
                                </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
           
        </div>
    </div>
</div>

@endsection