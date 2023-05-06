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
          <a href="{{ route('coupon.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Coupon </a>
        </h1>
         <!-- DataTales Example -->
        <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Coupon Details</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered">
               <tr>
                  <td>Coupon Name :</td>
                  <td>{{ $coupon->coupon_name }}</td>
               </tr>
               <tr>
                  <td>Coupon Discount :</td>
                  <td>{{ $coupon->coupon_discount }}%</td>
               </tr>
               <tr>
                  <td>Coupon Validity:</td>
                  <td>{{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D,d F Y')}}</td>
               </tr>
               <tr>
                  <td>Valid:</td>
                  <td>
                     @if($coupon->coupon_validity  >= Carbon\Carbon::now()->format('Y-m-d'))
                        <span class="badge badge-success">Valid</span>
                     @else
                       <span class="badge badge-danger">InValid</span>
                     @endif
                  </td>
               </tr>
               <td>Status</td>
                  <td>
                     @if ($coupon->status == 1)
                        <span class="badge badge-success">Active</span>
                     @else
                        <span class="badge badge-danger">Disable</span>
                     @endif

                  </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
 </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
