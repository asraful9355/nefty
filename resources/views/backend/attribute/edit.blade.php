@extends('layouts.app2')
@section('slider_create') active @endsection
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
            <a href="{{ route('attribute.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Attribute List </a>
        </h1>
        <!-- DataTales Example -->
        <div class="row">
            <form method="post" action="{{ route('attribute.update',$attribute->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
               <div class="col-md-12">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Attribute Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $attribute->name }}" id="name" class="form-control" placeholder="Write attribute name here">
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
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
