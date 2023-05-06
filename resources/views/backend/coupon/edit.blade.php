@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
          <a href="{{ route('coupon.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Coupon List</a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('coupon.update',$coupons->id) }}" >
              @csrf
              <div class="col-md-10 offset-2">
                  <div class="card shadow mb-4">
                      <div class="card-body">
                          <h4>Coupon Edit</h4>
                          <hr>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                  <label for="coupon_name">Coupon Name: <span class="text-danger">*</span></label>
                                  <input type="text" name="coupon_name" id="coupon_name" class="form-control" placeholder="Enter the coupon name" value="{{ $coupons->coupon_name }}">
                                  @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                             </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                  <label for="coupon_discount">Coupon Discount(%): <span class="text-danger">*</span></label>
                                  <input type="number" name="coupon_discount"  id="coupon_discount" class="form-control" placeholder="Enter the coupon discount" value="{{ $coupons->coupon_discount }}">
                                  @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                             </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                  <label for="coupon_validity">Coupon Validity Date: <span class="text-danger">*</span></label>
                                  <input type="date" name="coupon_validity"  id="coupon_validity" class="form-control" placeholder="Enter the coupon date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->coupon_validity }}">
                                  @error('coupon_validity')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                             </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                     <span class="text-danger">*</span>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $coupons->status == 1 ? 'checked': '' }} value="1">Active</option>
                                        <option value="0" {{ $coupons->status == 0 ? 'checked': '' }} value="1">Disable</option>
                                    </select>
                                </div>
                             </div>
                             <div class="col-md-12 text-right">
                                <div class="form-group">
                                  <button class="btn btn-success" type="submit">Save</button>
                                </div>
                             </div>
                          </div>
                      </div>
                  </div>
                </div>
            </form>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
