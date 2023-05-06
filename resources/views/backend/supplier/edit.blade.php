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
          <a href="{{ route('supplier.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All supplier </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('supplier.update',$supplier->id)}}">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Supplier Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_en"> Supplier Name: <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Supplier Phone : <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $supplier->phone }}" required class="form-control">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Supplier Email : <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" required>
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Supplier Address : <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" cols="5"  class="form-control ">{{ $supplier->address }}</textarea>
                              </div>
                           </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                     <span class="text-danger">*</span>

                                    <select name="status" id="status" class="form-control">
                                      @if ($supplier->status == 1)
                                      <option value="1" selected>Active</option>
                                      <option value="0">Disable</option>
                                      @else
                                      <option value="1">Active</option>
                                      <option value="0" selected>Disable</option>
                                      @endif

                                  </select>
                                </div>
                             </div>
                           <div class="col-md-12 text-right">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
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
