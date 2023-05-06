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
          <a href="{{ route('supplier.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Supplier List</a>
        </h1>
         <!-- DataTales Example -->
        <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Supplier Details</h6>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered">
             <tr>
                <td>Supplier Name</td>
                <td>{{ $supplier->name }}</td>
             </tr>
             <tr>
                <td>Supplier Phone Number</td>
                <td>{{ $supplier->phone }}</td>
             </tr>
             <tr>
                <td>Supplier Email Address</td>
                <td>{{ $supplier->email }}</td>
             </tr>
             <tr>
                <td>Supplier Address</td>
                <td>{{ $supplier->address }}</td>
             </tr>
             <tr>
                <td>Supplier Created_by</td>
                <td>{{ $supplier->user->name }}</td>
             </tr>


             <td>Status</td>
                <td>
                    @if ($supplier->status == 1)
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
