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
          <a href="{{ route('brand.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Brand </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('brand.update',$brand->id)}}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Brand Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_en">Brand Name (English): <span class="text-danger">*</span></label>
                                <input type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" id="brand_name_en" class="form-control">
                                @error('brand_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Brand Name (Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn }}" id="brand_name_bn" class="form-control">
                                @error('brand_name_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label for="brand_image">Brand Image</label>
                              <span class="text-danger">*</span>
                                <span class="text-danger">Image Size 320x88</span>
                              @error('brand_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <div class="mb-2">
                                <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($brand->brand_image) }}" alt="No Image" width="100px" height="80px;">
                              </div>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input image" name="brand_image" id="brand_image">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                     <span class="text-danger">*</span>

                                    <select name="status" id="status" class="form-control">
                                      @if ($brand->status == 1)
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
