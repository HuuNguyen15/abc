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
                                    <th>Tên mã giảm giá</th>
                                    <th>Mã giảm giá</th>
                                    <th>Só lượng</th>
                                    <th>Giảm theo</th>
                                    <th>Số giảm</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach ($all_coupon as $key => $coupon)
                            <tbody>
                              
                                <td>
                                    {{$coupon->coupon_id}}

                                </td>
                                <td>
                                    {{$coupon->coupon_name}}
                                </td>
                                <td>
                                    {{$coupon->coupon_code}}
                                </td>
                                <td>
                                    {{$coupon->coupon_time}}
                                </td>
                                <td>
                                    @if($coupon->coupon_condition==1)
                                    Giảm theo phần trăm%
                                    @else
                                    Giảm theo tiền $$
                                    @endif
                                </td>
                                <td>
                                    @if($coupon->coupon_condition==1)
                                    {{$coupon->coupon_number}}%
                                    @else
                                    {{$coupon->coupon_number}}vnđ
                                    @endif
                                </td>
                                <td>
                                   
                                    <a href="{{url('/delete-coupon-code/'.$coupon->coupon_id)}}" class="btn btn-danger">Xóa</a>
                                </td>

                            </tbody>
                            @endforeach

                        </table>
                    </div>

                    <!-- END DATA TABLE-->
                </div>
            </div>

          
          
        </div>
    </div>
</div>

@endsection