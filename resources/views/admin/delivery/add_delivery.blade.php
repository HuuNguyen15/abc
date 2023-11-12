@extends('admin_layout')
@section('admin_content')
<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <strong>Form</strong> Thêm phí vận chuyển chi tiểt
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
                  <form action="" class="form-horizontal">
                     @csrf
                     <div class="row form-group">
                        <div class="col col-md-3">
                           <label for="select" class=" form-control-label ">Chọn thành phố</label>
                        </div>
                        <div class="col-12 col-md-9">
                           <select name="thanhpho" id="thanhpho" class="form-control choose thanhpho">
                              <option value="">Chọn tỉnh thành phố</option>
                              @foreach($thanhpho as $key => $city)
                              <option value="{{$city->matp}}">{{$city->ten_tp}}</option>
                              @endforeach                     
                           </select>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3">
                           <label for="select" class=" form-control-label  ">Chọn quận huyện</label>
                        </div>
                        <div class="col-12 col-md-9">
                           <select name="quanhuyen" id="quanhuyen" class="form-control quanhuyen choose">
                              <option value="">Chọn quận huyện</option>
                           </select>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3">
                           <label for="select" class=" form-control-label  ">Chọn phường xã</label>
                        </div>
                        <div class="col-12 col-md-9">
                           <select name="phuongxa" id="phuongxa" class="form-control phuongxa">
                              <option value="">Chọn phường xã</option>
                           </select>
                        </div>
                     </div>
                     <div class="row form-group">
                        <div class="col col-md-3">
                           <label for="" class=" form-control-label">Phí vận chuyển</label>
                        </div>
                        <div class="col-12 col-md-9">
                           <input type="text" id="" name="fee_ship" placeholder="Text" class="form-control fee_ship">
                        </div>
                     </div>
                     <div class="card-footer">
                        <button type="submit" name="add_delivery" class="btn btn-primary btn-sm add_delivery">
                        Thêm 
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection