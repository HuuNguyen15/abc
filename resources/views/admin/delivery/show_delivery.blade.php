@extends('admin_layout')
@section('admin_content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           
           
           <div class="card">
            <h3 class="card-header">
                Thông tin phí vận chuyển
            </h3>
         
           </div>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <form action="">
                            @csrf
                       
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                  
                                    <th>Tên Thành phố</th>
                                    <th>Tên quận huyện</th>
                                    <th>
                                        Tên phường xã
                                    </th>
                                    <th>Phí</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fee_ship as $key => $fee)
                                <tr>
                                   
                                    <td>{{$fee->Thanhpho->ten_tp}}</td>
                                    <td>{{$fee->Quanhuyen->ten_quanhuyen}}</td>
                                
                                    <td>{{$fee->Xaphuong->ten_xaphuong}}</td>
                                    <td class="fee_feeship_edit" contenteditable data-feeship_id="{{$fee->fee_id}}">
                                        {{number_format((string)$fee->fee_feeship, 0, ',', '.')}}
                                    </td>                             
                                  </tr>
                               @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </form>
              
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection