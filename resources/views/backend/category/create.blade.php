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
            <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Category </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-12 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Category Create</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_en">Category Name (English): <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_en" value="" id="category_name_bn" class="form-control" placeholder="Write category name english">
                                @error('category_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_bn">Category Name (Bangla) <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_bn" value="" id="category_name_bn" class="form-control" placeholder="Write category name bangla">
                                @error('category_name_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label for="category_image">Category Image</label>
                              <span class="text-danger">*</span>

                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input image" name="category_image" id="category_image">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              @error('category_image')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          <div class="mb-2">
                            <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                          </div>


                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="status">Status</label>
                                   <span class="text-danger">*</span>
                                  <select name="status" id="status" class="form-control">
                                      <option value="1">Active</option>
                                      <option value="0">Disable</option>
                                  </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">

                                    <fieldset>
                                        <input type="checkbox" id="featured_category" name="featured_category" value="1">
                                        <label for="featured">Featured Category</label>
                                    </fieldset>

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
