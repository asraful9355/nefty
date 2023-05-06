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
          <a href="{{ route('vendor.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Vendor </a>
        </h1>
         <!-- DataTales Example -->
        <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Vendor Details</h6>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered">
             <tr>
                <td>Shop Name</td>
                <td>{{ $vendor->shop_name }}</td>
             </tr>
             <tr>
                <td>User Name</td>
                <td>{{ $vendor->user->name }}</td>
             </tr>
             <tr>
                <td>Phone Number</td>
                <td>{{ $vendor->phone }}</td>
             </tr>
             <tr>
                <td>Email Address</td>
                <td>{{ $vendor->email }}</td>
             </tr>
             <tr>
                <td>Facebool URL</td>
                <td>{{ $vendor->fb_url }}</td>
             </tr>
             <tr>
                <td>Bank Account</td>
                <td>{{ $vendor->bank_account }}</td>
             </tr>
             <tr>
                <td>Bank Name</td>
                <td>{{ $vendor->bank_name }}</td>
             </tr>
             <tr>
                <td>Holder Name</td>
                <td>{{ $vendor->holder_name }}</td>
             </tr>
             <tr>
                <td>Branch Name</td>
                <td>{{ $vendor->branch_name }}</td>
             </tr>
             <tr>
                <td>Routing Name</td>
                <td>{{ $vendor->routing_name }}</td>
             </tr>
             <tr>
                <td>Address</td>
                <td>{{ $vendor->address }}</td>
             </tr>
             <tr>
                <td>Commission</td>
                <td>{{ $vendor->commission }}</td>
             </tr>
             <tr>
                <td>Description</td>
                <td>{{ $vendor->description }}</td>
             </tr>


             <tr>
                <td>Shop Profile</td>
                <td><img src="{{ asset($vendor->shop_profile) }}" alt="" style="height:70px; width:80px;"></td>
             </tr>
             <tr>
                <td>Shop Cover</td>
                <td>
                  <img src="{{ asset($vendor->shop_cover) }}" alt="" style="height:70px; width:80px;">
               </td>
             </tr>
             <tr>
                <td>NID</td>
                <td>
                  <img src="{{ asset($vendor->nid) }}" alt="" style="height:70px; width:80px;">
               </td>
             </tr>
             <tr>
                <td>Trade License</td>
                <td>
                  <img src="{{ asset($vendor->trade_license) }}" alt="" style="height:70px; width:80px;">
               </td>
             </tr>
             <td>Status</td>
                <td>
                    @if ($vendor->status == 1)
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
